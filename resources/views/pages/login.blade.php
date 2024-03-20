<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>E-Commerce Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{-- CSS --}}
    @include('style.css')

</head>

<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="text-center">
            <a href="index.html" class="logo"><span>Konnco<span>Studio</span></span></a>
            <h5 class="text-muted mt-0 font-600">E-Commerce Application</h5>
        </div>
        <div class="m-t-40 card-box">
            <div class="text-center">
                <h4 class="text-uppercase font-bold mb-0">Sign In</h4>
            </div>

            <div class="p-20">

                {{-- Message Error --}}
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                {{-- End Message Error --}}

                <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light"
                                type="submit">Log In</button>
                        </div>
                    </div>

                </form>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="text-black">Back to <a href="{{ route('dashboard') }}"
                                class="text-primary"><b>Dashboard</b></a></p>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card-box-->
    </div>
    <!-- end wrapper page -->

    {{-- Script --}}
    @include('style.script')
</body>

</html>
