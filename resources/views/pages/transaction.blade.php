@extends('app')
@section('title', 'Transaction')
@section('content')
<div class="row">
    <div class="col-12">

        {{-- Message Error --}}
        @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
        {{-- End Message Error --}}

        <div class="card-box">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Transaction Id</th>
                            <th>Bank</th>
                            <th>Total Price</th>
                            <th>VA Number</th>
                            <th>Bill Key</th>
                            <th>Biller Code</th>
                            <th>Status</th>
                            <th>Expire Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $transaction )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->bank }}</td>
                            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                            <td>{{ $transaction->va_number }}</td>
                            <td>{{ $transaction->bill_key }}</td>
                            <td>{{ $transaction->biller_code }}</td>
                            <td>
                                @if ($transaction->transaction_status == 'UNPAID')
                                <span class="badge badge-primary">UNPAID</span>
                                @elseif ($transaction->transaction_status == 'PAID')
                                <span class="badge badge-success">PAID</span>
                                @elseif ($transaction->transaction_status == 'EXPIRED')
                                <span class="badge badge-danger">EXPIRED</span>
                                @else
                                <span class="badge badge-danger">CANCELED</span>
                                @endif
                            </td>
                            <td>{{ $transaction->expire_time }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('detail-transaction',$transaction->id) }}" class="btn btn-sm btn-primary">View</a>

                                    @if ($transaction->transaction_status == 'UNPAID')
                                    <form action="{{ route('cancel',$transaction->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Cancel</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
