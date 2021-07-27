<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#addkartu" wire:click.prevent="clearform()"><i class="fas fa-fw fa-plus-circle"></i>
		  <strong>Tambah Data Kartu</strong>
		</button>
		<div>
			<br>
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
	  	<div class="table-responsive" wire:poll>
	<table class="table table-light">
		<thead class="table">
			<tr>
				<th>No</th>
				<th>UID</th>
				<th>QR Code</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($kartu as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->uid }}</td>
					<td>
						<div class="visible-print text-center border-light">
						    {!! QrCode::size(100)->generate($datas->uid); !!}
						    
						</div>
					</td>
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
						<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editkartu" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Ubah</strong></button>
						<hr>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
	  {{ $kartu->links() }}
	  </div>
	</div>

	<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Tambah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addkartu" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-credit-card"></i> Tambah UID</h5>
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
    <label class="text-white" for="">UID</label>
    <input type="text" name="uid" wire:model="uid" class="form-control" placeholder="Tap Kartu">
    @error('uid') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
<div wire:ignore.self class="modal fade" id="editkartu" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-credit-card"></i> Ubah UID</h5>
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
    <label class="text-white" for="">UID</label>
    <input type="text" name="uid" wire:model="uid" class="form-control" placeholder="Tap Kartu
    ">@error('uid') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
	<!-- Ubah Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->


<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($kartu as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-credit-card"></i> {{ $datas->uid }}</h5>
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
