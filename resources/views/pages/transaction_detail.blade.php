@extends('app')
@section('title','Transaction Detail')

@section('content')
{{-- TOTAL DAN STATUS --}}
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row justify-content-between">
                <div class="col-4">
                    <strong>Total Harga : Rp {{ number_format($transaction->total_price, 0 , ',', '.') }}</strong>
                </div>
                <div class="col-4">
                    <strong>Status : </strong>
                    @if ($transaction->transaction_status == 'UNPAID')
                    <span class="badge badge-primary">UNPAID</span>
                    @elseif ($transaction->transaction_status == 'PAID')
                    <span class="badge badge-success">PAID</span>
                    @elseif ($transaction->transaction_status == 'EXPIRED')
                    <span class="badge badge-danger">EXPIRED</span>
                    @else
                    <span class="badge badge-danger">CANCELED</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- DEATIL PRODUCT --}}
@foreach ($transaction->transactionDetail as $items )
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-2 text-center">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($items->product->galleries as $photo )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="/assets/images/products/{{ $photo->photos }}" class="d-block w-100"
                                    alt=" ...">
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-10 ">
                    <div class="ml-2">
                        {{-- Description Product --}}
                        <div>
                            <h2 class="m-0 mt-3 mt-md-0">{{ $items->product->name }} (Order {{ $items->quantity }})</h2>
                            <span class="text-muted">Rp {{ number_format($items->product->price, 0 , ',', '.') }}</span>
                            <br>
                            <span class="badge badge-primary">{{ $items->product->category->name }}</span>
                            <p class="mt-3" style="text-align: justify">{{ $items->product->description }}</p>
                        </div>
                        {{-- End --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END --}}
@endforeach

@endsection
