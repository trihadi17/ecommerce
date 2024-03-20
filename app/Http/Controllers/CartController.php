<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Model
use App\Models\Cart;

class CartController extends Controller
{
    public function index(){
        // current user
        $user = Auth::user();

        $cart = Cart::with('product.galleries')->where('users_id',$user->id)->get();

        return view('pages.cart',compact('cart'));
    }

    public function cart($id){
        // get data cart
        $cart = Cart::where('products_id',$id)->first();

        try {
            DB::beginTransaction();

            // cek data product apakah sudah termasuk dalam cart atau belum
            if (!$cart) {
                // insert data to database
                Cart::create([
                    'products_id' => $id,
                    'users_id' => Auth::user()->id,
                    'quantity' => 1
                ]);
                
            }else{
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
            }

            DB::commit();

            return redirect('/cart');

        } catch (\Throwable $e) {
            DB::rollBack();

            return back();
        }
    }
}
