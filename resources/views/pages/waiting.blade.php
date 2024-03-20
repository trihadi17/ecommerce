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
        <div class="ex-page-content text-center">
            <div class="text-error">WAITING</div>
            <h3 class="text-uppercase font-600">Your Transaction Has Been Saved</h3>
            <p class="text-muted">
                Your transaction has been saved, please click the Return Transaction button to find out the payment
                number, payment status and expiration date
            </p>
            <br>
            <a class="btn btn-success waves-effect waves-light" href="{{ route('transaction') }}"> Transaction Page</a>

        </div>
    </div>
    <!-- End wrapper page -->


    {{-- SCRIPT --}}
    @include('style.script')

</body>

</html>
