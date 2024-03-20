@extends('app')
@section('title','New Product')
@section('content')

<div class="row">
    @foreach ($product as $product )
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('detail-product', $product->id) }}" style="color: black">
            <div class="card-box widget-user">
                <div>
                    <img src="/assets/images/products/{{ $product->galleries[0]->photos }}" class="img-responsive"
                        alt="user">
                    <div class="wid-u-info">
                        <h5 class="mt-0 m-b-5">{{ $product->name }}</h5>
                        <p class="text-muted m-b-5 font-13"> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <small class="text-warning"><b>{{ $product->category->name }}</b></small>
                    </div>
                </div>
            </div>
        </a>
    </div><!-- end col -->
    @endforeach
    <!-- end col -->
</div>
<!-- end row -->

@endsection
