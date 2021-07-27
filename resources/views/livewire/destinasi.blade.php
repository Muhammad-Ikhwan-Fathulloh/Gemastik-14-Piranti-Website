<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    
    <br>
    <div wire:ignore.self class="card">
      <div class="card-header">
        <i class="fas fa-fw fa-map"></i><strong> Destinasi</strong>
      </div>
      <div class="card-body bg-gradient-dark">
        <select class="custom-select" id="inputGroupSelect01" onchange="cari(this.value)">
          <option selected>Destinasi</option>
          @foreach($destinasi as $data)
          <option value="{{$data->id}}">{{$data->nama_destinasi}}</option>
          @endforeach
        </select>
        <hr>
        <div id="mapid"></div>
      </div>
    </div>
    <hr>
</div>
@push('scripts')
<script>
  var map = L.map('mapid').setView([-6.9482061697098745, 107.6011037683509], 13);
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

  //var marker = L.marker([-6.9772027, 107.6597198]).addTo(map);

  // L.marker([-6.9772027, 107.6597198], {icon: Iconmap}).addTo(map).on('click', function(e){
  //   alert(e.latlng);
  // });

  // L.marker([-6.97175334171425, 107.65453577041626], {icon: Iconmap}).addTo(map).on('click', function(e){
  //   alert(e.latlng);
  // });

  $(document).ready(function(){
    $.getJSON('/destinasi/json', function(data){
      $.each(data, function(index){
        L.marker([parseFloat(data[index].longitude_destinasi), parseFloat(data[index].latitude_destinasi)], {icon: Iconmap}).addTo(map).on('click', function(e){
          var html = '<h6><strong>Informasi Destinasi</strong></h6>';
              html+= '<hr>';
              html+= '<h6>Nama : '+data[index].nama_destinasi+'</h6>';
              html+= '<h6>Alamat : '+data[index].alamat_destinasi+'</h6>';
              html+= '<h6>Keterangan : '+data[index].keterangan_destinasi+'</h6>';
              html+= '<h6>Harga : Rp.'+data[index].harga_destinasi+',-</h6>';
              html+= '<h6>Pengunjung : '+data[index].jumlah_pengunjung+' Orang</h6>';
              html+= '<img height="100px" src="'+data[index].gambar_destinasi+'">';
          L.popup().setLatLng([parseFloat(data[index].longitude_destinasi), parseFloat(data[index].latitude_destinasi)]).setContent(html).openOn(map);
        });
      });
    });
  });
  function cari(id){
    $.getJSON('/destinasi/json', function(datas){
      $.each(datas, function(indexs){
        if (datas[indexs].id==id) {
          map.flyTo([parseFloat(datas[indexs].longitude_destinasi), parseFloat(datas[indexs].latitude_destinasi)], 19);
        }
      });
    });
  }

  // //polyline
  // var latlngs = [
  //         [          
  //           -6.9759492291736445,
  //           107.66090869903564
  //         ],
  //         [         
  //           -6.97782352208453,
  //           107.65790462493896
  //         ],
  //         [
  //           -6.975587148996625,
  //           107.65442848205566
  //         ]
  // ];

  // var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

  // polyline.setStyle({
  //   weight:25,
  //   linecap:'round',
  //   color:'blue'
  // });

  // polyline.on('click', (e)=>{
  //   alert(e.latlngs)
  // })

  // // zoom the map to the polyline
  // map.fitBounds(polyline.getBounds());

  // //polygon
  // var latlngs = [
  //         [
            
  //           -6.9776318333812855,
  //           107.66135931015015
  //         ],
  //         [
            
  //           -6.977653132129967,
  //           107.6655864715576
  //         ],
  //         [
            
  //           -6.979250535519187,
  //           107.66271114349365
  //         ],
  //         [
            
  //           -6.977866119563483,
  //           107.66144514083862
  //         ]

  // ];

  // var polygon = L.polygon(latlngs, {color: 'red'}).addTo(map);

  // polygon.setStyle({
  //   color:'yellow',
  //   fillColor:'blue',
  //   weight:5,
  //   linecap:'square'
  // });

  // polygon.on('click',(e)=>{
  //   alert("hello");
  // });

  // // zoom the map to the polygon
  // map.fitBounds(polygon.getBounds());

  //googleHybrid 
  // L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
  //   maxZoom: 20,
  //   subdomains:['mt0','mt1','mt2','mt3']
  // }).addTo(map);

  //googleSat 
  // L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
  //   maxZoom: 20,
  //   subdomains:['mt0','mt1','mt2','mt3']
  // }).addTo(map);

  //googleTerrain 
  // L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
  //   maxZoom: 20,
  //   subdomains:['mt0','mt1','mt2','mt3']
  // }).addTo(map);

  // Hybrid: s,h;
  // Satellite: s;
  // Streets: m;
  // Terrain: p;
  
</script>
@endpush
