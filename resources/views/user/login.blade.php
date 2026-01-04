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
    <title>campifyy</title>

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

    </style>
</head>

<body>

    <div class="login-wrapper text-center">

        <h1 class="site-heading mb-4">
            <span class="site-heading-upper">Selamat Datang</span><br>
            <span class="site-heading-lower">campifyy</span>
        </h1>

        <div class="login-card">

            <h4>Login</h4>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn btn-login w-100">
                    Login
                </button>
            </form>

            <p class="mt-3 mb-0 text-center">
                Belum punya akun?
                <a href="/register"><b>Register</b></a>
            </p>

        </div>
    </div>
</body>
</html>
