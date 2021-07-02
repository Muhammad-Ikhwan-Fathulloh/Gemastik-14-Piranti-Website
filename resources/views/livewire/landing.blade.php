<div>
    {{-- Stop trying to control. --}}
    <br>
<h4 class="text-white"><i class="fas fa-fw fa-map"></i> Destinasi Skut Bandung</h4>
<hr>
<div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari Kategori Kecamatan" aria-label="Search" value="">
          <span class="btn btn-outline-light" value="cari"><i class="fas fa-fw fa-search"></i></span>
        </form>
    </div>
    <br>
<div class="row row-cols-1 row-cols-md-2 g-4" wire:poll>
@foreach ($destinasi as $datas)
<div class="col">
	<div class="card bg-b">
      <img src="{{ $datas->gambar_destinasi }}" class="card-img-top rounded" width="250px">
      <div class="card-body">
        <h5 class="card-title text-white"><strong>{{ $datas->nama_destinasi }}</strong></h5>
        <hr class="text-white">
        <p class="card-title text-white"><strong>Harga :</strong> Rp.{{ number_format($datas->harga_destinasi) }},-</p>
        <p class="card-title text-white"><strong>Alamat :</strong> {{ $datas->alamat_destinasi }}</p>
        <p class="card-title text-white"><strong>Pengunjung :</strong> {{ $datas->jumlah_pengunjung }} <strong>Orang</strong></p>
        <p class="card-title text-white"><strong>Kecamatan :</strong> {{ $datas->kategori_kecamatan }}</p>
        <hr class="text-white">
        <h6 class="card-title text-white"><strong>Perkiraan Cuaca </strong><i class="fas fa-fw fa-cloud"></i></h6>
        <p class="card-title text-white"><strong>Suhu :</strong> {{ $datas->suhu }} <strong>°C</strong></p>
        <p class="card-title text-white"><strong>Kelembapan :</strong> {{ $datas->kelembapan }} <strong>%</strong></p>
        <hr class="text-white">
        <div class="text-white">
       	<tr>
	      <th>{{ $datas->keterangan_destinasi }}</th>
        </tr>
        <hr class="text-white">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detailDestinasi{{ $datas->id }}" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-eye"></i>
      <strong>Detail</strong>
    </button>
	    
        </div>
        
      </div>
    </div>
</div>
@endforeach
</div>

<!-- ------------------------------------------------------------------------------------------------------ -->
  <!-- Tambah Data -->
  <!-- Modal -->
<div wire:ignore.self class="modal fade" id="detailDestinasi{{ $datas->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-map"></i> <strong>Destinasi {{ $datas->nama_destinasi }}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-ku">
        <!-- Form -->
        <form wire:submit.prevent="Pesan({{ $datas->id }})">
    @if (session('pesan'))
      <div class="alert alert-success">
        {{session('pesan')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
    @endif
  <div class="form-group">
    <div class="row">
      <div class="col">
        <img src="{{ $datas->gambar_destinasi }}" width="200px">
      </div>
      <div class="col">
        <label class="text-white" for=""><strong>Harga :</strong> Rp.{{ number_format($datas->harga_destinasi) }},-</label>
        <br>
        <label class="text-white" for=""><strong>Alamat :</strong> {{ $datas->alamat_destinasi }}</label>
        <br>
        <label class="text-white" for=""><strong>Pengunjung :</strong> {{ $datas->jumlah_pengunjung }} <strong>Orang</strong></label>
        <br>
        <label class="text-white" for=""><strong>Kecamatan :</strong> {{ $datas->kategori_kecamatan }}</label>
      </div>
    </div>
    
  </div>

  <div class="form-group">
    <div class="row">
      <div class="col">
        <h6 class="card-title text-white"><strong>Perkiraan Cuaca </strong><i class="fas fa-fw fa-cloud"></i></h6>
        <label class="text-white" for=""><strong>Suhu :</strong> {{ $datas->suhu }} <strong>°C</strong></label>
        <br>
        <label class="text-white" for=""><strong>Kelembapan :</strong> {{ $datas->kelembapan }} <strong>%</strong></label>
      </div>
      <div class="col">
        
      </div>
    </div>
  </div> 
        <!-- Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" wire:submit.prevent="Pesan({{ $datas->id }})">Pesan</button>
      </div>
    </div>
  </div>
</div>
</form>
  <!-- modal -->
  <!-- Tambah Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- ------------------------------------------------------------------------------------------------------ -->


</div>
