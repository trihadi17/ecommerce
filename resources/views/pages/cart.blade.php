@extends('app')
@section('title', 'Cart')
@section('content')
<div class="row">
    <div class="col-12">

        {{-- Message Error --}}
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        {{-- End Message Error --}}

        <form action="{{ route('transaction') }}" method="POST">
            @csrf
            <div class="card-box">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $cart )
                        <tr>
                            <td>
                                <div class="checkbox checkbox-primary checkbox-single">
                                    <input type="checkbox" value="{{ $cart }}" name="cart[]">
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <img src="/assets/images/products/{{ $cart->product->galleries[0]->photos }}"
                                    style="height: 50px;" alt="">
                            </td>
                            <td>{{ $cart->product->name }}</td>
                            <td>Rp {{ number_format ($cart->product->price, 0, ',', '.') }}</td>
                            <td>{{ $cart->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Bank Select</label>
                            <div class="col-10">
                                <select class="form-control" name="bank">
                                    <option selected disabled>Open this Bank Menu</option>
                                    <option value="bca">BCA</option>
                                    <option value="bni">BNI</option>
                                    <option value="bri">BRI</option>
                                    <option value="mandiri">Mandiri Bill</option>
                                    <option value="permata">Permata</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <button class="btn btn-success btn-sm btn-block btn-rounded">Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
