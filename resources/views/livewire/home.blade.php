<div>
    {{-- Be like water. --}}
    <div wire:poll.1000ms>
        <h5 class="text-white btn btn-info"><strong>{{ now() }}</strong></h5>
    </div>
    <hr>
    <div class="card bg-gradient-dark">
      <div class="card-body">
        <h5 class="text-white"><strong>Halo, {{ Auth::user()->name }}</strong></h5>
      </div>
    </div>
    <!-- <div class="card mb-4 bg-ku" style="max-width: 1200px;">
  <div class="row no-gutters">
    <div class="col-md-4" align="center">
      <img src="{{ url('logo/skut_bandung.png') }}" width="300">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title text-white">Selamat Datang, {{ Auth::user()->name }}</h5>
        <p class="card-text text-white" align="justify">Melihat potensi pariwisata di era perkembangan zaman yang semakin masif. Diperlukan sebuah sistem yang dapat meningkatkannya menjadi lebih sederhana. Kami dari tim Nocturnailed menghadirkan Skut Bandung, sebuah Aplikasi Penyedia Informasi Kepariwisataan Kota Bandung berbasis Internet of Things.</p>
        <p class="card-text text-white"><small><i class="fas fa-fw fa-street-view"></i> Skuy sikat destinasi Bandung jadi lebih sederhana!</small></p>
        <a href="https://sttbandung.ac.id/" class="text-white btn btn-primary">STT Bandung</a>
      </div>
    </div>
  </div>
</div> -->
    <hr>
    @if (auth()->user()->level==1)
    	<div class="row">

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Destinasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $destinasi }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksis }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>    
    @elseif (auth()->user()->level==2)
        <div class="row">

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Destinasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $destinasis }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksis }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>      
    @elseif (auth()->user()->level==3)
    <div>
      <h5 class="text-white"><strong>Data Saya :</strong></h5>
    </div>
        <div class="row">

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center ">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Jumlah Destinasi</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $destinasi }}</div> -->
                      <a href="/destinasi" class="h5 mb-0 font-weight-bold text-white btn btn-primary">{{ $destinasi }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Saldo</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format(Auth::user()->saldo) }},-</div> -->
                      <a href="/topup" class="h5 mb-0 font-weight-bold text-white btn btn-success">Rp.{{ number_format(Auth::user()->saldo) }},-</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Transaksi Belum Terpakai</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksi }}</div> -->
                      <a href="/transaksi" class="h5 mb-0 font-weight-bold text-white btn btn-warning">{{ $transaksi }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Transaksi Sudah Terpakai</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksi }}</div> -->
                      <a href="/transaksi" class="h5 mb-0 font-weight-bold text-white btn btn-info">{{ $transaksis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
        </div>            
    @endif
    <hr>
    <!-- <div id="mapid"></div>
    <hr> -->
</div>

<!-- ------------------------------------------------------------------------------------------------- -->
<!-- @push('scriptk') -->
<script>
  var map = L.map('mapid').setView([-6.9482061697098745, 107.6011037683509], 15);
  //L.esri.basemapLayer('Topographic').addTo(map);

  //googleStreets
  L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
  }).addTo(map);

  var Iconmap = L.icon({
    iconUrl: 'logo/iconmap.png',

    iconSize:     [80, 100], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
  });

  var marker = L.marker([-6.9482061697098745, 107.6011037683509], {icon: Iconmap}).addTo(map);
  
</script>
<!-- @endpush -->
