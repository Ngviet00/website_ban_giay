<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/images/logos/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}" />
</head>

<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    @include('admin.layouts.sidebar')

    <div class="body-wrapper">
        <!--  Header Start -->
        @include('admin.layouts.header')
        <!--  Header End -->
        <div class="container-fluid">
            @yield('content')

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">AdminMart.com</p>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin//assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
@yield('js')
</body>

</html>
