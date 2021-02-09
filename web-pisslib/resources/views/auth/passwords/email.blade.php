
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('wp-pisslib/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('wp-pisslib/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-primary">




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-lg-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block "></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-danger mb-4">Forgot Your Password?</h1>
              
              </div>
              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        

              <form class="user" method="POST" action="{{ route('password.email') }}">
                        @csrf
                <div class="form-group">
                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
              </form>
              <hr>
              <div class="text-center">
              <a class="small text-primary" href="/register">Create an Account!</a>
              </div>
              <div class="text-center">
                <a class="small" href="/login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('wp-pisslib/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('wp-pisslib/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('wp-pisslib/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('wp-pisslib/js/sb-admin-2.min.js')}}"></script>

</body>

</html>


