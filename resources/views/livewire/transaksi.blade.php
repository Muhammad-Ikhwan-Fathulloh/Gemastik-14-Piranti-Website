<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if (auth()->user()->level==1)
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan UID" aria-label="Search" value="">
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
	  	<div class="table-responsive">
	<table class="table table-light">
		<thead class="table">
			<tr>
				<th>No</th>
				<th>UID</th>
				<th>QR Code</th>
				<th>ID Destinasi</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($transaksi as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->uid }}</td>
					<td>
						<div class="visible-print text-center border-light">
						    {!! QrCode::size(100)->generate($datas->uid); !!}
						    
						</div>
					</td>
					<td>{{ $datas->id_destinasi }}</td>
					<td>
						@if (auth()->user()->level==1)
		                    <div class="form-check form-switch" align="right">
							  @if($datas->status == 0)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})">
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
							  @elseif($datas->status == 1)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})" checked>
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
							  @endif
							</div>
		              	@elseif (auth()->user()->level==2)
		                   	<div class="form-check form-switch" align="right">
							  @if($datas->status == 0)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})">
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
							  @elseif($datas->status == 1)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})" checked>
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
							  @endif
							</div>
		              	@elseif (auth()->user()->level==3)
		              	<div class="form-check form-switch" align="right">
		                    @if($datas->status == 0)
		                    	Belum Terpakai
		                    	<br>
		                    	<input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusk({{ $datas->id }})">
		                    	
		                    @elseif($datas->status == 2)
		                    	Tunda Pemakaian
		                    	<br>
		                    	<input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusk({{ $datas->id }})" checked>
		                    	
		                    @elseif($datas->status == 1)
		                    	Sudah Terpakai
		                    	<br>
		                    	<input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusk({{ $datas->id }})" checked>
		                    @endif
		                    </div>
		              	@endif
						
					</td>
					<td>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
	  {{ $transaksi->links() }}
	  </div>
	</div>
    @elseif (auth()->user()->level==2)
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan UID" aria-label="Search" value="">
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
	  	<div class="table-responsive">
	<table class="table table-light">
		<thead class="table">
			<tr>
				<th>No</th>
				<th>UID</th>
				<th>QR Code</th>
				<th>ID Destinasi</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($transaksi as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->uid }}</td>
					<td>
						<div class="visible-print text-center border-light">
						    {!! QrCode::size(100)->generate($datas->uid); !!}
						    
						</div>
					</td>
					<td>{{ $datas->id_destinasi }}</td>
					<td>
						@if (auth()->user()->level==1)
		                    <div class="form-check form-switch" align="right">
							  @if($datas->status == 0)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})">
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
							  @elseif($datas->status == 1)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})" checked>
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
							  @endif
							</div>
		              	@elseif (auth()->user()->level==2)
		                   	<div class="form-check form-switch" align="right">
							  @if($datas->status == 0)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})">
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
							  @elseif($datas->status == 1)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})" checked>
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
							  @endif
							</div>
		              	@elseif (auth()->user()->level==3)
		              	<div class="form-check form-switch" align="right">
		                    @if($datas->status == 0)
		                    	Belum Terpakai
		                    	<br>
		                    	<input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusk({{ $datas->id }})">
		                    	
		                    @elseif($datas->status == 2)
		                    	Tunda Pemakaian
		                    	<br>
		                    	<input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusk({{ $datas->id }})" checked>
		                    	
		                    @elseif($datas->status == 1)
		                    	Sudah Terpakai
		                    	<br>
		                    	<input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusk({{ $datas->id }})" checked>
		                    @endif
		                    </div>
		              	@endif
						
					</td>
					<td>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
	  {{ $transaksi->links() }}
	  </div>
	</div>
@elseif (auth()->user()->level==3)
@if(!empty(Auth::user()->saldo))
    <span class="btn btn-info">Saldo Saya : Rp.{{ number_format(Auth::user()->saldo) }},-</span>
    @endif
    <hr>
<strong class="text-white">Detail Transaksi :</strong>
<hr>
@foreach ($transaksik as $datas)
	<div class="card" wire:poll>
  <div class="card-header">
    Destinasi {{ $datas->nama_destinasi }}
  </div>
  <div class="card-body">
  	<div class="row row-cols-1 row-cols-md-2 g-4">
  		<div class="col">
  			<img height="100px" src="{{ $datas->gambar_destinasi }}">
  		</div>
  		<div class="col">
  			<p><strong>Destinasi :</strong> {{ $datas->nama_destinasi }}</p>
  			<p><strong>Alamat :</strong> {{ $datas->alamat_destinasi }}</p>
        	<p><strong>Kecamatan :</strong> {{ $datas->kategori_kecamatan }}</p>
        <hr class="text-white">
  		</div>
  		<div class="col" align="right">
    
		                    @if($datas->status == 0)
		                    	
		                    	<span class="btn btn-success"><strong>Belum Terpakai</strong></span>
		                    	
		                    @elseif($datas->status == 2)
		                    	
		                   	 	<span class="btn btn-info"><strong>Tunda Pemakaian</strong></span>
		                    	
		                    @elseif($datas->status == 1)
		                    	
		                    	<span class="btn btn-danger"><strong>Sudah Terpakai</strong></span>
		                    	
		                    @endif
		     
		     <br>
  		</div>
  	</div>
  </div>
  <div class="card-footer">
  	<div class="row">
  		<div class="col">
  			Skut Bandung
  		</div>
  		<div class="col" align="right">
  			Tanggal Transaksi : {{ $datas->created_att }}
  		</div>
  	</div>
  </div>
</div>
<br>
@endforeach
@endif

	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($transaksi as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->uid }}</h5>
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
</div>
