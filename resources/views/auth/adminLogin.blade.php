
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Sep 2020 07:46:24 GMT -->
<head>
<meta charset="utf-8" />
<title>{{config('app.name')}}-Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="The most credible credit scoring platform" name="description" />
<meta content="Nakroteck" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <!-- App favicon -->
<link rel="shortcut icon" href="{{asset('temp/admin/assets/images/favicon.ico')}}">
<!-- App css -->
<link href="{{asset('temp/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
@yield('extra-css')
</head>
    <body class="authentication-bg">
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">

                                <div class="row">
                                    <div class="col-md-6 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="{{ route('welcome') }}">
                                                <img src="{{asset('temp/assets/images/logo.png')}}" alt="" height="60" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">{{config('app.name')}}</h3>
                                            </a>
                                        </div>
                                
                                        <form method={{$method}} action="{{$action ?? ''}}" class="authentication-form">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="your email address" />                                                   
                                                </div>
                                                @if ($errors->has('email'))
                                                <small class="help-block form-text text-danger">
                                                    {{ $errors->first('email') }}
                                                </small>
                                            @endif
                                            </div>
                                
                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="your password" />                                                   
                                                </div>
                                                @if ($errors->has('password'))
                                                <small class="help-block form-text text-danger">
                                                    {{ $errors->first('password') }}
                                                </small>
                                                @endif
                                            </div>
                                
                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkbox-signin" checked>
                                                    <label class="custom-control-label" for="checkbox-signin">Remember
                                                        me
                                                    </label>
                                                </div>
                                            </div>
                                
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> Log In
                                                </button>
                                            </div>
                                        </form>
                                
                                    </div>
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div class="auth-user-testimonial">
                                                <p></p>
                                                <p class="font-size-24 font-weight-bold text-white mb-1"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                             <div class="row mt-3">
                            <div class="col-12 text-center">
                            <p class="text-muted">&copy; {{date('Y')}}<a href="#" class="text-primary font-weight-bold ml-1">{{config('app.name')}}</a></p>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <!-- Vendor js -->
    <script src="{{asset('temp/admin/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
    <script src="{{asset('temp/admin/assets/js/app.min.js')}}"></script>
        @yield('extra-js')
    </body>

</html>
