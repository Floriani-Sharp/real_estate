<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Connexion</title>
    <link rel="apple-touch-icon" href="{!! asset('/app-assets/images/ico/apple-icon-120.png')!!}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('/app-assets/images/ico/favicon.ico')!!}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/vendors/css/vendors.min.css')!!}">
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
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/plugins/forms/form-validation.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/app-assets/css/pages/page-auth.css')!!}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('/assets/css/style.css')!!}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <h1 class="text-center brand-text text-primary ml-1">
                                    CONNEXION
                                </h1>
                                <form class="auth-login-form mt-2" action="{{ route('login.authenticate') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                                           required name="email" placeholder="john@example.com" 
                                            aria-describedby="email" tabindex="1" autofocus />
                                        @error('email')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">Mot de passe</label>
                                            {{-- <a href="page-auth-forgot-password-v1.html">
                                                <small>Forgot Password?</small>
                                            </a> --}}
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" 
                                                id="password" name="password" tabindex="2" 
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" 
                                                aria-describedby="password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            @error('password')
                                                <small class="text-danger" role="alert"></small>{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="remember" type="checkbox" id="remember-me" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Se souvenir de moi </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="4">Se connecter</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Vous êtes nouveau?</span>
                                    <a href="{{ route('register') }}">
                                        <span>Créer un compte</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })


        @if (session('error'))
            toastr['error']("Quelque chose s'est mal passée !" , 'Erreur',  {
                closeButton: true,
                tapToDismiss: false,
                progressBar: true,
                timeOut: time ,
                showDuration: 5000,
                hideMethod: 'slideUp'
            });
        @endif
    </script>
</body>
<!-- END: Body-->

</html>