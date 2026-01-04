<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/"
    />

    <!-- title -->
    <title>Campifyy</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
    <!-- google font -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
      rel="stylesheet"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(rgba(5,25,34,0.65), rgba(5,25,34,0.65)), url("{{ asset('assets/img/hero-bg.jpg') }}") no-repeat center center / cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-wrapper {
            width: 100%;
        }

        .site-heading-upper {
            font-family: 'Poppins', sans-serif;
            color: #F28123;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .site-heading-lower {
            font-family: 'Poppins', sans-serif;
            font-size: 48px;
            font-weight: 700;
            color: #fff;
        }

        .login-card {
            background: #ffffff;
            border-radius: 6px;
            padding: 35px;
            max-width: 380px;
            margin: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,.25);
        }

        .login-card h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }

        .login-card input {
            border: 1px solid #eee;
            padding: 12px;
            width: 100%;
            margin-bottom: 15px;
        }

        .btn-login {
            background: #F28123;
            color: #fff;
            border: none;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            transition: .3s;
        }

        .btn-login:hover {
            background: #e06c00;
        }

        .login-card a {
            color: #F28123;
        }

        .alert-danger ul {
            padding-left: 18px;
            margin-bottom: 0;
        }

        .alert-danger li {
            list-style: disc;
        }
    </style>
</head>
<body>
    <div class="login-wrapper text-center">
        <h1 class="site-heading mb-4">
            <span class="site-heading-upper">Selamat Datang</span><br>
            <span class="site-heading-lower">campifyy</span>
        </h1>

        <div class="login-card">
            <h4>Register</h4>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <input type="Name" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Password Comfirm" required>
                <button type="submit" class="btn btn-login w-100">
                    Register
                </button>
            </form>

            <p class="mt-3 mb-0 text-center">
                Sudah punya akun?
                <a href="/login"><b>Login</b></a>
            </p>
        </div>
    </div>
</body>
</html>
