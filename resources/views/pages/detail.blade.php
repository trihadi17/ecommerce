@extends('app')
@section('title','Detail Product')

@section('content')
{{-- DEATIL PRODUCT --}}
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-2 text-center">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($product->galleries as $item )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="/assets/images/products/{{ $item->photos }}" class="d-block w-100"
                                            alt=" ...">
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Checkout --}}
                    @auth

                    <div class="form-group row mt-2">
                        <div class="col-12">
                            <form action="{{ route('cart-create',$product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block btn-sm btn-rounded">Add To
                                    Chart</button>
                            </form>
                        </div>
                    </div>

                    @endauth
                    {{-- End --}}

                </div>
                <div class="col-12 col-md-10 ">
                    <div class="ml-2">
                        {{-- Description Product --}}
                        <div>
                            <h2 class="m-0 mt-3 mt-md-0">{{ $product->name }}</h2>
                            <span class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <br>
                            <span class="badge badge-primary">{{ $product->category->name }}</span>
                            <p class="mt-3" style="text-align: justify">{{ $product->description }}</p>
                        </div>
                        {{-- End --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END --}}

{{-- SIMILAR PRODUCT --}}

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Similar Product </h4>
    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="row">
    @foreach ($similarProduct as $similarProduct)
    @if ($similarProduct->id != $product->id)
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('detail-product', $similarProduct->id) }}" style="color: black">
            <div class="card-box widget-user">
                <div>
                    <img src="/assets/images/products/{{ $similarProduct->galleries[0]->photos }}"
                        class="img-responsive" alt="user">
                    <div class="wid-u-info">
                        <h5 class="mt-0 m-b-5">{{ $similarProduct->name }}</h5>
                        <p class="text-muted m-b-5 font-13"> Rp
                            {{ number_format($similarProduct->price, 0, ',', '.') }}</p>
                        <small class="text-warning"><b>{{ $similarProduct->category->name }}</b></small>
                    </div>
                </div>
            </div>
        </a>
    </div><!-- end col -->
    @endif
    @endforeach
    <!-- end col -->
</div>
<!-- end row -->
{{-- END --}}
@endsection
