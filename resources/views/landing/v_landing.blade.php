
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Website | Skut Bandung</title>
    <link rel="shortcut icon" type="image/png" href="logo/skut_bandung.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <link href="{{asset('template')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('template')}}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('template')}}/css/sb-admin-2.min.css" rel="stylesheet">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
@livewireStyles
<meta name="theme-color" content="#7952b3">


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

      .bg-kuk {
        background: #4682b4;
      }

      .bg-b {
        background: #464866;
      }

    </style>

    
  </head>
  <body class="bg-ku">
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-white">Melihat potensi pariwisata di era perkembangan zaman yang semakin masif. Diperlukan sebuah sistem yang dapat meningkatkannya menjadi lebih sederhana. Kami dari tim Nocturnailed menghadirkan Skut Bandung, sebuah Aplikasi Penyedia Informasi Kepariwisataan Kota Bandung berbasis Internet of Things.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Skut Bandung</a></li>
            <li><a href="#" class="text-white">Sekolah Tinggi Teknologi Bandung</a></li>
            <li><a href="#" class="text-white">Nocturnailed Team</a></li>
          </ul>
          <a href="/login" class="btn btn-sm btn-info text-white"><i class="fas fa-fw fa-sign-in-alt"></i> Login</a>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-gradient-info shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="{{ url('logo/skut_bandungk.png') }}" width="120px">
        <!-- <strong>Skut Bandung</strong> -->
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </div>
</header>

<main>
  <section class="py-5 text-center container text-white">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <img src="{{ url('logo/Success.png') }}" width="170px">
        <hr>
        <h1 class="fw-light"><strong>< SKUT BANDUNG ></strong></h1>
        <p class="lead"><i class="fas fa-fw fa-street-view"></i> Skuy sikat destinasi Bandung jadi lebih sederhana!</p>
  <div class="row">
    <div class="col-sm-5 col-md-6 text-right">
      <a href="/login" class="btn btn-sm btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Login</a>
    </div>
    <div class="col-sm-5 col-md-6 text-left">
      <a href="/register" class="btn btn-sm btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Register</a>
    </div>
  </div>
        
      </div>
    </div>
  </section>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4682b4" fill-opacity="1" d="M0,160L288,192L576,256L864,224L1152,160L1440,192L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path></svg>
<div class="bg-kuk">
  <section>
    <div class="container">
  <div class="row">
    <div class="col-sm-5 col-md-6 text-center">
      <img src="{{ url('logo/logo.png') }}" width="400px">
    </div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 text-center">
      
      <strong class="text-white">Skut Bandung <i class="fas fa-fw fa-fighter-jet"></i></strong>
      <p class="text-white">Melihat potensi pariwisata di era perkembangan zaman yang semakin masif. Diperlukan sebuah sistem yang dapat meningkatkannya menjadi lebih sederhana. Kami dari tim Nocturnailed menghadirkan Skut Bandung, sebuah Aplikasi Penyedia Informasi Kepariwisataan Kota Bandung berbasis Internet of Things.</p>
    </div>
  </div>
</div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#464866" fill-opacity="1" d="M0,96L288,64L576,160L864,160L1152,128L1440,64L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path></svg>
</div>
  <div class="album py-5 bg-b">
    <div class="container">
            <!-- Main content -->
            <section class="content">

              <div class="container">
                <div class="row">
                  <div class="col-sm-5 col-md-6 text-center">
                   <!--  -->
                   @livewire('fiturk')
                  </div>
                  <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 text-center">
                    <img src="{{ url('logo/logo2.png') }}" width="400px">
                  </div>
                </div>
              </div>         
               <!--  -->
               
               @livewire('landing')
            </section>
            <!-- /.content -->
          </div>
        </div>
         @livewireScripts
</main>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#464866" fill-opacity="1" d="M0,128L288,256L576,128L864,160L1152,64L1440,0L1440,0L1152,0L864,0L576,0L288,0L0,0Z"></path></svg>
<section class="bg-ku">
  <footer class="text-white py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#" class="text-white btn btn-success"><i class="fas fa-fw fa-arrow-circle-up"></i> Back to top</a>
      </p>
      <p class="mb-1">Sekolah Tinggi Teknologi Bandung</p>
      <p class="mb-0">Nocturnailed Team</p>
      <hr>
      <p class="mb-2">Copyright &copy; 2021 | Skut Bandung</p>
    </div>
  </footer>
</section>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

   <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
    integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
    crossorigin=""></script>
@stack('scripts')

      
  </body>
</html>
