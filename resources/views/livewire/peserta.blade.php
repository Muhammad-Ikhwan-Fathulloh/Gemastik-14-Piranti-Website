<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Nama" aria-label="Search" value="">
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
				<th>Fullname</th>
				<th>Username</th>
				<th>UID</th>
				<th>QR Code</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>No Handphone</th>
				<th>Saldo</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Level</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($users as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->name }}</td>
					<td>{{ $datas->username }}</td>
					<td>{{ $datas->uid }}</td>
					<td>
						@if(!empty($datas->uid))
						<div class="visible-print text-center border-light">
						    {!! QrCode::size(100)->generate($datas->uid); !!}
						    
						</div>
						@else
						<div>
							<p>UID Kosong</p>
						</div>
						@endif
					</td>
					<td>{{ $datas->email }}</td>
					<td>{{ $datas->alamat }}</td>
					<td>{{ $datas->nohp }}</td>
					<td>Rp.{{ number_format($datas->saldo) }},-</td>
					<td>{{ $datas->latitude_user }}</td>
					<td>{{ $datas->longitude_user }}</td>
					<td>
						  @if($datas->level == 1)
						  <p class="btn btn-danger text-white"> Admin Master</p>
						  @elseif($datas->level == 2)
						  <p class="btn btn-warning text-white">Admin Destinasi</p>
						  @elseif($datas->level == 3)
						  <p class="btn btn-success text-white">Pelanggan</p>
						  @endif
					</td>
					<td>
						<div class="form-check form-switch" align="right">
						  @if($datas->status == 0)
						  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})">
						  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
						  @elseif($datas->status == 1)
						  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click.prevent="statusku({{ $datas->id }})" checked>
						  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
						  @endif
						</div>
					</td>
					<td>
						@if($datas->level == 1)
						<span>Admin</span>
						@else
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
						@endif
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
	  <hr>
	  {{ $users->links() }}
	  </div>
	</div>

	<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($users as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-user"></i> {{ $datas->name }}</h5>
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
