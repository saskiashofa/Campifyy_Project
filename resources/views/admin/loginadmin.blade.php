<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bg-image-vertical {
            position: relative;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }

        .btn-primary {
            color: #fff;
            background-color: #c99755ff;
            border-color: #ebcda6ff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #b88645;
            border-color: #b88645;
        }
    </style>
</head>
<body>

<section class="vh-100">
  <div class="container-fluid vh-100">
    <div class="row vh-100">
      <div class="col-sm-6 text-black d-flex align-items-center">
        <div class="px-5 ms-xl-4 w-100">

          <form action="{{ route('admin.login') }}" method="POST" style="width: 23rem;">
            @csrf

            <h2 class="fw-normal mb-4"><b>Login Admin Campifyy</b></h2>

            {{-- ERROR --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-4">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email..." required>
            </div>

            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
            </div>

            <button class="btn btn-primary w-100" type="submit">Login</button>
          </form>
        </div>

      </div>

      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="{{ asset('admin/img/login.jpg') }}"
          class="w-100 vh-100"
          style="object-fit: cover;">
      </div>

    </div>
  </div>
</section>

</body>
</html>
