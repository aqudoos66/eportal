<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Portal Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
    <!-- Mobile image (shows on small screens only) -->
    <div class="col-12 d-block d-lg-none text-center p-4">
        <img src="{{ asset('assets/img/logo.jpg') }}" alt="Welcome" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
    </div>

    <!-- Desktop image (background style, hidden on mobile) -->
    <div class="col-lg-6 d-none d-lg-block"
         style="background-image: url('{{ asset('assets/img/logo.jpg') }}'); background-size: cover; background-position: center;">
    </div>

    <!-- Login form -->
    <div class="col-12 col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <form method="POST" action="{{ url('/login') }}" class="user">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email" required autofocus>
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
            <hr>
        </div>
    </div>
</div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
