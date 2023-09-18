<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/all.css')}}">

    <title></title>
</head>

<body>

    <div class="formm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <form method="POST" action="{{ route('mainlogin') }}" id="login-form">
                        @csrf
                        <div class="formmm">
                            <h4 class="Login mb-2">Login</h4>
                            <h3 class="Login mb-4">Welcome Back!</h3>
                            <input type="email" id="form2Example1" class="form-control my-3" name="email" placeholder="Email/Username/Mobile No" />
                            <input type="password" id="form2Example2" class="form-control my-3" name="password" placeholder="Enter Your Password" />

                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="#!">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="col-sm-auto px-1 mb-2">
                                <button type="submit" id="login-button" class="btn btn-primary w-100">Login</button>
                            </div>


                            <!-- Register buttons -->
                            <div class="text-center">
                                <p class="mt-2">Dont't have an account? <a href="">Sign up</a></p>
                                <div class="or"><span>OR</span></div>
                                <hr class="line">
                                </hr>

                                <a class="loginBtn loginBtn--facebook" href="{{route('redirectToGoogle')}}"><i class="fab fa-google me-2"></i>Login with google</a>
                                <a class="loginBtnn loginBtn--facebook" href="{{route('redirectToFacebook')}}"><i class="fab fa-facebook-square"></i>Login with facebook</a>
                                <a class="loginBtnnn loginBtn--facebook" href="{{route('redirectToFacebook')}}"><i class="fas fa-phone-square-alt"></i>Login with mobile no</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>

</body>

</html>
