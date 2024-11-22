<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | Admin Kpm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Login_v18/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="Login_v18/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/endor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login_v18/css/main.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('register-action') }}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Register Web
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Name">
                        <input class="input100" type="text" name="name">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Name</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Unit Kerja">
                        <input class="input100" type="text" name="unitkerja">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Unit Kerja</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                    <br>
                    <a href="{{ route('login') }}" class="btn btn-ungu"> Login Now!! </a>
                </form>

                <div class="login100-more" style="background-image: url('Login_v18/images/kpm.png');">
                </div>
            </div>
        </div>
    </div>


    <script src="Login_v18/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="Login_v18/vendor/animsition/js/animsition.min.js"></script>
    <script src="Login_v18/vendor/bootstrap/js/popper.js"></script>
    <script src="Login_v18/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="Login_v18/vendor/select2/select2.min.js"></script>
    <script src="Login_v18/vendor/daterangepicker/moment.min.js"></script>
    <script src="Login_v18/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="Login_v18/vendor/countdowntime/countdowntime.js"></script>
    <script src="Login_v18/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
