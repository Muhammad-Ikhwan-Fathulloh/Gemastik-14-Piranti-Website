
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login | Skut Bandung</title>
  <link rel="shortcut icon" type="image/png" href="logo/skut_bandung.png">

  <!-- Custom fonts for this template-->
  <link href="{{asset('template')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('template')}}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('template')}}/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .bg-ku {
        background: linear-gradient(to right, #29648a, #25274d);
      }

      .bg-ka {
        background: linear-gradient(to right, #25274d, #29648a);
      }
    </style>
</head>

<body class="bg-ku">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-ka">
                <a href="/"><img src="{{ url('logo/skut_bandung.png') }}" width="450px"></a>
              </div>
              <div class="col-lg-6 bg-ku">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-white mb-4">Welcome to Skut Bandung!</h1>
                    <p class="p text-white mb-4">Aplikasi penyedia informasi Kepariwisataan Kota Bandung</p>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-group">
                      <input id="email" type="email" name="email" class="form-control-user border-primary form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">
                                
                    </div>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user border-primary @error('password') is-invalid @enderror" required id="password" placeholder="Password">
                                
                    </div>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <!-- <a href="/login" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                    
                    <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                  
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small text-white" href="/register">Create an Account!</a>
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
  <script src="{{asset('template')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('template')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('template')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('template')}}/js/sb-admin-2.min.js"></script>

</body>

</html>
