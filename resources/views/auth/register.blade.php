<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Inscription</title>
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
    <link rel="stylesheet" href="{!!asset('/app-assets/vendors/css/forms/select/select2.min.css')!!}">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow b{
            border: none !important ;
            position: relative !important;
            left: 0 !important;
            top: 40% !important;
        }
    </style>
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
                        <!-- Register v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">
                                        Inscrption
                                    </h2>
                                </a>

                                <form class="auth-register-form mt-2" action="{{ route('register.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('error') is-invalid @enderror" id="email" 
                                           required name="email" value="{{ old('email') }}" placeholder="john@example.com" aria-describedby="email" 
                                            tabindex="2" />
                                        @error('email')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="role" class="form-label">Statut</label>
                                        <select name="role" class="select2 form-control form-control-lg" required 
                                            data-placeholder="Choisir le role" id="role">
                                            <option value="" disabled selected>Choisir le role</option>
                                            <option {{ old('role') == 'owner' ? 'selected' : '' }} value="owner">Propriétaire</option>
                                            <option {{ old('role') == 'tenant' ? 'selected' : '' }} value="tenant">Locataire</option>
                                        </select>
                                        @error('role')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Mot de passe</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge  @error('password') is-invalid @enderror" 
                                                id="password" name="password" required
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" tabindex="3" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            @error('password')
                                                <small class="text-danger" role="alert">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Confirmer mot de passe</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge  @error('password') is-invalid @enderror" 
                                                id="password_confirmation" name="password_confirmation" required
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" tabindex="3" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            @error('password')
                                                <small class="text-danger" role="alert">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="agree" type="checkbox" id="register-privacy-policy" tabindex="4" required />
                                            <label class="custom-control-label" for="register-privacy-policy">
                                                J'accepte les
                                                <a href="javascript:void(0);">
                                                    politique de confidentialité et conditions d'utilisation
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="5">
                                        S'inscrire
                                    </button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Vous avez déjà un compte ?</span>
                                    <a href="{{ route('login') }}">
                                        <span>Connectez-vous</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Register v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{!! asset('/app-assets/vendors/js/vendors.min.js')!!}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('/app-assets/vendors/js/ui/jquery.sticky.js')!!}"></script>
    <script src="{!! asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')!!}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{!! asset('/app-assets/js/core/app-menu.js')!!}"></script>
    <script src="{!! asset('/app-assets/js/core/app.js')!!}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{!! asset('/app-assets/js/scripts/pages/page-auth-register.js')!!}"></script>
    <!-- END: Page JS-->
    <script src="{!! asset('app-assets/vendors/js/forms/select/select2.full.min.js') !!}"></script>
    <script>
        $('.select2').select2()
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>