<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>E-Commerce Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{-- STYLE --}}
    @include('style.css')
</head>

<body>

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Content --}}
    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">@yield('title')</h4>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <!-- Content -->
            @yield('content')

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->



    <!-- Footer -->
    @include('components.footer')
    <!-- End Footer -->

    {{-- Script --}}
    @include('style.script')
    {{-- End Script --}}



</body>

</html>
