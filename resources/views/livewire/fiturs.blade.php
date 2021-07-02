<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#addfitur" wire:click.prevent="clearform()"><i class="fas fa-fw fa-plus-circle"></i>
		  <strong>Tambah Data Fitur</strong>
		</button>
    <div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Judul Fitur" aria-label="Search" value="">
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
				<th>Judul</th>
				<th>Gambar</th>
				<th>Fitur</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($fiturs as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->judul }}</td>
          <td><img height="100px" src="{{ $datas->gambar }}"></td>
					<td>{{ $datas->fitur }}</td>
					<td>{{ $datas->keterangan }}</td>
					<td>
						<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editfitur" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Ubah</strong></button>
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
<div wire:ignore.self class="modal fade" id="addfitur" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-tasks"></i> Tambah Fitur</h5>
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
    <label class="text-white" for="">Judul</label>
    <input type="text" name="judul" wire:model="judul" class="form-control" placeholder="Masukkan Judul">
    @error('judul') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Gambar</label>
    <input type="text" name="gambar" wire:model="gambar" class="form-control" placeholder="Masukkan Gambar">
    @error('gambar') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Fitur</label>
    <input type="text" name="fitur" wire:model="fitur" class="form-control" placeholder="Masukkan Fitur">
    @error('fitur') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Keterangan</label>
    <input type="text" name="keterangan" wire:model="keterangan" class="form-control" placeholder="Masukkan Keterangan">
    @error('keterangan') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
<div wire:ignore.self class="modal fade" id="editfitur" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-tasks"></i> Ubah Fitur</h5>
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
    <label class="text-white" for="">Judul</label>
    <input type="text" name="judul" wire:model="judul" class="form-control" placeholder="Masukkan Judul">
    @error('judul') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Gambar</label>
    <input type="text" name="gambar" wire:model="gambar" class="form-control" placeholder="Masukkan Gambar">
    @error('gambar') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Fitur</label>
    <input type="text" name="fitur" wire:model="fitur" class="form-control" placeholder="Masukkan Fitur">
    @error('fitur') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Keterangan</label>
    <input type="text" name="keterangan" wire:model="keterangan" class="form-control" placeholder="Masukkan Keterangan">
    @error('keterangan') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
@foreach ($fiturs as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->judul }}</h5>
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
