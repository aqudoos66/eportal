
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
<form class="user" method="POST" action="{{ url('/register') }}">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="first_name" class="form-control form-control-user" placeholder="First Name" value="{{ old('first_name') }}">
            @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" name="last_name" class="form-control form-control-user" placeholder="Last Name" value="{{ old('last_name') }}">
            @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address" value="{{ old('email') }}">
        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-6">
            <input type="password" name="password_confirmation" class="form-control form-control-user" placeholder="Repeat Password">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Register Account
    </button>
</form>

                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="{{ asset('/login') }}">Already have an account? Login!</a>
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