<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div wire:poll.1000ms>
        <h5 class="text-white btn btn-info"><strong>{{ now() }}</strong></h5>
    </div>
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#adddestinasi" wire:click.prevent="clearform()"><i class="fas fa-fw fa-plus-circle"></i>
		  <strong>Tambah Data Destinasi</strong>
		</button>
    <hr>
    <div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Nama Destinasi" aria-label="Search" value="">
          <span class="btn btn-outline-light" value="cari"><i class="fas fa-fw fa-search"></i></span>
        </form>
    </div>
    <br>
	  	<!-- Pesan -->
	  	@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
		<hr>
		<!-- Data -->
	  	<div class="table-responsive" wire:poll>
	<table class="table table-light">
		<thead class="table">
			<tr>
				<th>No</th>
				<th>ID Destinasi</th>
				<th>QR Code</th>
				<th>Gambar Destinasi</th>
				<th>Nama Destinasi</th>
				<th>Alamat Destinasi</th>
				<th>Harga Destinasi</th>
				<th>Kategori Destinasi</th>
				<th>Keterangan Destinasi</th>
				<th>Jumlah Pengunjung</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($destinasi as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_destinasi }}</td>
					<td>
						<div class="visible-print text-center border-light">
						    {!! QrCode::size(100)->generate($datas->id_destinasi); !!}
						    
						</div>
					</td>
					<td><img height="100px" src="{{ $datas->gambar_destinasi }}"></td>
					<td>{{ $datas->nama_destinasi }}</td>
					<td>{{ $datas->alamat_destinasi }}</td>
					<td>Rp.{{ number_format($datas->harga_destinasi) }},-</td>
					<td>{{ $datas->kategori_kecamatan }}</td>
					<td>{{ $datas->keterangan_destinasi }}</td>
					<td>{{ $datas->jumlah_pengunjung }}</td>
					<td>{{ $datas->latitude_destinasi }}</td>
					<td>{{ $datas->longitude_destinasi }}</td>
					<td>
						<div class="form-check form-switch" align="right">
						  @if($datas->status == 0)
						  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click="">
						  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
						  @elseif($datas->status == 1)
						  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click="" checked>
						  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
						  @endif
						</div>
					</td>
					<td>
						<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editdestinasi" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Ubah</strong></button>
						<hr>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>

	  </div>
	</div>
<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Tambah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="adddestinasi" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-map"></i> Tambah Destinasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click.prevent="clearform()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-ku">
        <!-- Form -->
        <form wire:submit.prevent="SimpanData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
  <div class="form-group">
    <label class="text-white" for="">ID Destinasi</label>
    <input type="text" name="id_destinasi" wire:model="id_destinasi" class="form-control" placeholder="Scan ID Alat">
    @error('id_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Gambar Destinasi</label>
    <input type="text" name="gambar_destinasi" wire:model="gambar_destinasi" class="form-control" placeholder="Masukkan Link Gambar">
    @error('gambar_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>


  <div class="form-group">
    <label class="text-white" for="">Nama Destinasi</label>
    <input type="text" name="nama_destinasi" wire:model="nama_destinasi" class="form-control" placeholder="Masukkan Nama Destinasi">
    @error('nama_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Alamat Destinasi</label>
    <input type="text" name="alamat_destinasi" wire:model="alamat_destinasi" class="form-control" placeholder="Masukkan Tempat Lahir">
    @error('alamat_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>


  <div class="form-group">
    <label class="text-white" for="">Harga Destinasi</label>
    <input type="text" name="harga_destinasi" wire:model="harga_destinasi" class="form-control" placeholder="Masukkan Harga Destinasi">
    @error('harga_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Kategori Destinasi</label>
    <!-- <input type="text" name="status" wire:model="status" class="form-control" placeholder="Masukkan Status"> -->

    <select class="custom-select" id="inputGroupSelect01" type="text" name="kategori_kecamatan" wire:model="kategori_kecamatan">
	  <option selected>------- Kategori Destinasi -------</option>
	  @foreach ($kategori as $datak)
	  <option value="{{$datak->kategori_kecamatan}}">{{$datak->kategori_kecamatan}}</option>
	  @endforeach
	</select>

    @error('kategori_kecamatan') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  
  <div class="form-group">
    <label class="text-white" for="">Keterangan Destinasi</label>
    <input type="text" name="keterangan_destinasi" wire:model="keterangan_destinasi" class="form-control" placeholder="Masukkan Keterangan Destinasi">
    @error('keterangan_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Latitude Destinasi</label>
    <input type="text" name="latitude_destinasi" wire:model="latitude_destinasi" class="form-control" placeholder="Masukkan Latitude Destinasi">
    @error('latitude_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Longitude Destinasi</label>
    <input type="text" name="longitude_destinasi" wire:model="longitude_destinasi" class="form-control" placeholder="Masukkan Longitude Destinasi">
    @error('longitude_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  

        <!-- Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clearform()">Close</button>
        <button type="submit" class="btn btn-primary" wire:submit.prevent="SimpanData()">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
	<!-- modal -->
	<!-- Tambah Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Ubah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editdestinasi" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-map"></i> Ubah Destinasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click.prevent="clearform()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-ku">
        <!-- Form -->
        <form wire:submit.prevent="UbahData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
  <div class="form-group">
    <label class="text-white" for="">ID Destinasi</label>
    <input type="text" name="id_destinasi" wire:model="id_destinasi" class="form-control" placeholder="Scan ID Alat">
    @error('id_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Gambar Destinasi</label>
    <input type="text" name="gambar_destinasi" wire:model="gambar_destinasi" class="form-control" placeholder="Masukkan Link Gambar">
    @error('gambar_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>


  <div class="form-group">
    <label class="text-white" for="">Nama Destinasi</label>
    <input type="text" name="nama_destinasi" wire:model="nama_destinasi" class="form-control" placeholder="Masukkan Nama Destinasi">
    @error('nama_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Alamat Destinasi</label>
    <input type="text" name="alamat_destinasi" wire:model="alamat_destinasi" class="form-control" placeholder="Masukkan Tempat Lahir">
    @error('alamat_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>


  <div class="form-group">
    <label class="text-white" for="">Harga Destinasi</label>
    <input type="text" name="harga_destinasi" wire:model="harga_destinasi" class="form-control" placeholder="Masukkan Harga Destinasi">
    @error('harga_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Kategori Destinasi</label>
    <!-- <input type="text" name="status" wire:model="status" class="form-control" placeholder="Masukkan Status"> -->

    <select class="custom-select" id="inputGroupSelect01" type="text" name="kategori_kecamatan" wire:model="kategori_kecamatan">
	  <option selected>------- Kategori Destinasi -------</option>
	  @foreach ($kategori as $datak)
	  <option value="{{$datak->kategori_kecamatan}}">{{$datak->kategori_kecamatan}}</option>
	  @endforeach
	</select>

    @error('kategori_kecamatan') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  
  <div class="form-group">
    <label class="text-white" for="">Keterangan Destinasi</label>
    <input type="text" name="keterangan_destinasi" wire:model="keterangan_destinasi" class="form-control" placeholder="Masukkan Keterangan Destinasi">
    @error('keterangan_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Latitude Destinasi</label>
    <input type="text" name="latitude_destinasi" wire:model="latitude_destinasi" class="form-control" placeholder="Masukkan Latitude Destinasi">
    @error('latitude_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Longitude Destinasi</label>
    <input type="text" name="longitude_destinasi" wire:model="longitude_destinasi" class="form-control" placeholder="Masukkan Longitude Destinasi">
    @error('longitude_destinasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  

        <!-- Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clearform()">Close</button>
        <button type="submit" class="btn btn-primary" wire:submit.prevent="UbahData()">Ubah</button>
      </div>
    </div>
  </div>
</div>
</form>
	<!-- modal -->
	<!-- Tambah Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($destinasi as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-map"></i> {{ $datas->nama_destinasi }}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white">
        Apakah anda yakin ingin menghapus data ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger" wire:click.prevent="deleteData({{ $datas->id }})" data-dismiss="modal">Ya</button>
      </div>
    </div>
  </div>
</div>
@endforeach

	<!-- Hapus Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->
</div>
