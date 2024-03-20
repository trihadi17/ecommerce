<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

// Model
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionHistory;

class TransactionController extends Controller
{
    public function index(){
        // get transaction data
        $transaction = Transaction::where('users_id',Auth::user()->id)
        ->orderBy('created_at','asc')
        ->get();
        return view('pages.transaction',compact('transaction'));
    }

    public function detail($id){
        $transaction = Transaction::with('transactionDetail.product.galleries','transactionDetail.product.category')
            ->where('id',$id)
            ->where('users_id',Auth::user()->id)
            ->first();
        return view('pages.transaction_detail',compact('transaction'));
    }

    public function transaction(Request $request){
        // request validation
        $request->validate([
            'bank' => 'required|string|in:bca,bni,bri,mandiri,permata'
        ]);

        // parsing data to variable
        $arrayRequest = $request->cart;

        // variable
        $totalPrice = 0;
        $transactionId = Str::uuid()->toString();

        try {
            DB::beginTransaction();
            
            // check cart data (empty or not)
            if (!empty($arrayRequest)) {
                // loop
                foreach ($arrayRequest as $key => $value) {
                    // decode a JSON String
                    $data = json_decode($value);

                    // get total price
                    $totalPrice += $data->quantity * $data->product->price;

                    // credentials
                    $transaction =  [
                        'id' => $transactionId,
                        'users_id' => Auth::user()->id,
                        'shipping_price' => 0,
                        'total_price' => $totalPrice,
                        'transaction_status' => 'UNPAID',
                        'bank' => $request->bank,
                    ];

                    $transactionDetail [] = [
                        'transactions_id' => $transactionId,
                        'products_id' => $data->products_id,
                        'price' => $data->product->price,
                        'quantity' => $data->quantity
                    ];

                    // delete cart by products id and current user
                    Cart::where('products_id', $data->products_id)
                        ->where('users_id',Auth::user()->id)
                        ->delete();
                }

                // insert data to database (transaction, transaction detail)
                $transactionTable = Transaction::create($transaction);
                $transactionDetailTable = TransactionDetail::insert($transactionDetail);

                // MIDTRANS PROCESS
                $serverKey = config('midtrans.server_key');

                // bank type cek
                if ($request->bank == 'mandiri') {
                    $response = Http::withBasicAuth($serverKey,'')->post('https://api.sandbox.midtrans.com/v2/charge',[
                    'payment_type' => 'echannel',
                    'transaction_details' => [
                        'order_id' =>  $transactionId,
                        'gross_amount' => $totalPrice,
                    ],
                    'echannel' => [
                    'bill_info1' => 'Payment:',
                    'bill_info2' => 'Online Purchase',
                    ],
                    'customer_details' => [
                        'email' => Auth::user()->email,
                        'first_name' => Auth::user()->first_name,
                        'last_name' => Auth::user()->last_name,
                    ],
                    'custom_expiry' => [
                        'expiry_duration' => 1,
                        'unit' => 'minute'
                    ]
                ]);
                }elseif ($request->bank == 'permata') {
                    $response = Http::withBasicAuth($serverKey,'')->post('https://api.sandbox.midtrans.com/v2/charge',[
                    'payment_type' => 'permata',
                    'transaction_details' => [
                        'order_id' =>  $transactionId,
                        'gross_amount' => $totalPrice,
                    ],
                    'customer_details' => [
                        'email' => Auth::user()->email,
                        'first_name' => Auth::user()->first_name,
                        'last_name' => Auth::user()->last_name,
                    ],
                    'custom_expiry' => [
                        'expiry_duration' => 1,
                        'unit' => 'minute'
                    ]
                ]);
                }else{
                    $response = Http::withBasicAuth($serverKey,'')->post('https://api.sandbox.midtrans.com/v2/charge',[
                    'payment_type' => 'bank_transfer',
                    'transaction_details' => [
                        'order_id' =>  $transactionId,
                        'gross_amount' => $totalPrice,
                    ],
                    'bank_transfer' => [
                        'bank' => $request->bank
                    ],
                    'customer_details' => [
                        'email' => Auth::user()->email,
                        'first_name' => Auth::user()->first_name,
                        'last_name' => Auth::user()->last_name,
                    ],
                    'custom_expiry' => [
                        'expiry_duration' => 1,
                        'unit' => 'minute'
                    ]
                ]);
                }

                // cek jika response failed
                if ($response->failed()) {
                    return back()->with('error','failed charge');
                }

                // ambil data response dari midtrans
                $result = $response->json();
                // cek jika code nya selain 201 alias error
                if ($result['status_code'] != '201') {
                    return back()->with('error', $result['status_message']);
                    
                }

                // END MIDTRANS PROCESS

               
                // Check the data in the transaction table to change the status with the order ID parameter in Midtrans
                $findTransaction = Transaction::find($transactionId);
                if (!$findTransaction) {
                    return back()->with('error','invalid');
                }

                 // Update table transaction (va_number/bill key, biller code)
                if ($request->bank == 'mandiri') {
                    $findTransaction->bill_key = $result['bill_key'];
                    $findTransaction->biller_code = $result['biller_code'];
                    $findTransaction->expire_time = $result['expiry_time'];
                    $findTransaction->save();

                }elseif($request->bank == 'permata'){
                    $findTransaction->va_number = $result['permata_va_number'];
                    $findTransaction->expire_time = $result['expiry_time'];
                    $findTransaction->save();
                }else{
                    $findTransaction->va_number = $result['va_numbers'][0]['va_number'];
                    $findTransaction->expire_time = $result['expiry_time'];
                    $findTransaction->save();
                }

                DB::commit();

                return redirect('/transaction/waiting');

            }else{
                DB::rollBack();

                return back()->with('error','Select at least one item at checkout');
            }
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // WEBHOOK DARI MIDTRANS
    public function handlePaymentNotification(Request $request){
        // Get Request Dari Midtrans
        $payload = $request->all();
        $transactionId = $payload['order_id'];
        $statusCode = $payload['status_code'];
        $grossAmount = $payload['gross_amount'];
        $reqSignatureKey = $payload['signature_key'];

        // hashing request
        $signature = hash('sha512',$transactionId.$statusCode.$grossAmount.config('midtrans.server_key'));

        // cek untuk melakukan apakah request tersebut dari midtrans atau bukan
        if ($signature != $reqSignatureKey) {
            return response()->json([
                'message' => 'invalid signature'
            ],401);
        }

        // get transaction status from midtrans
        $transactionStatus = $payload['transaction_status'];

        // insert data to table transaction history
        TransactionHistory::create([
            'transactions_id' => $transactionId,
            'status' => $transactionStatus,
            'payload' => json_encode($payload)
        ]);

        // cek data pada tabel transaction untuk mengubah status dengan parameter
        $transaction = Transaction::find($transactionId);
        if (!$transaction) {
            return response()->json([
                'message' => 'invalid order'
            ],400);
        }

        // Update Status
        if ($transactionStatus == 'settlement') {
            $transaction->transaction_status = 'PAID';
            $transaction->save();
        }elseif ($transactionStatus == 'expire') {
            $transaction->transaction_status = 'EXPIRED';
            $transaction->save();
        }elseif ($transactionStatus == 'cancel') {
            $transaction->transaction_status = 'CANCEL';
            $transaction->save();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function cancelTransaction($id){
        // server key midtrans
        $serverKey = config('midtrans.server_key');

        // request to midtrans
        $response = Http::withBasicAuth($serverKey, '')->post('https://api.sandbox.midtrans.com/v2/' . $id . '/cancel',[
            'order_id' => $id
        ]);

        // response body midtrans
        $result = $response->json();

        return back()->with('message', $result['status_message']);
    }

    public function waiting(){
        return view('pages.waiting');
    }
}
