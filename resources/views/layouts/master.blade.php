<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>
        @yield('title')
    </title>
    <link rel="apple-touch-icon" href="{!! asset('/app-assets/images/ico/apple-icon-120.png')!!}">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{!! asset('/app-assets/images/ico/favicon.ico"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/vendors/css/vendors.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/vendors/css/charts/apexcharts.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/vendors/css/extensions/toastr.min.css')!!}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/bootstrap.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/bootstrap-extended.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/colors.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/components.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/themes/dark-layout.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/themes/bordered-layout.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/themes/semi-dark-layout.css')!!}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/core/menu/menu-types/horizontal-menu.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/pages/dashboard-ecommerce.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/plugins/charts/chart-apex.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/plugins/extensions/ext-component-toastr.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/plugins/forms/form-file-uploader.css')!!}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('/assets/css/style.css')!!}">
    <!-- END: Custom CSS-->
    @stack('style')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
        @include('layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
        @include('layouts.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               @yield('content')
            </div>
        </div>
    </div>
    @yield('modal')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{!! asset('/app-assets/vendors/js/vendors.min.js')!!}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('/app-assets/vendors/js/ui/jquery.sticky.js')!!}"></script>
    <script src="{!! asset('/app-assets/vendors/js/charts/apexcharts.min.js')!!}"></script>
    <script src="{!! asset('/app-assets/vendors/js/extensions/toastr.min.js')!!}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{!! asset('/app-assets/js/core/app-menu.js')!!}"></script>
    <script src="{!! asset('/app-assets/js/core/app.js')!!}"></script>
    <script src="{!! asset('/app-assets/vendors/js/extensions/dropzone.min.js')!!}"></script>
    <script src="{!! asset('/app-assets/js/scripts/forms/form-file-uploader.js')!!}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 34,
                    height: 34
                });
            }
        })
    </script>
    @stack('script')
</body>
<!-- END: Body-->

</html>