<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
     <div wire:poll.1000ms>
        <h5 class="text-white btn btn-info"><strong>{{ now() }}</strong></h5>
    </div>
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#addvoucher" wire:click.prevent="clearform()"><i class="fas fa-fw fa-plus-circle"></i>
		  <strong>Tambah Data Voucher</strong>
		</button>
    <hr>
		<div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan ID Voucher" aria-label="Search" value="">
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
				<th>ID Voucher</th>
				<th>QR Code</th>
				<th>Nominal</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($vouchers as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_voucher }}</td>
					<td>
						<div class="visible-print text-center border-light">
						    {!! QrCode::size(100)->generate($datas->id_voucher); !!}
						    
						</div>
					</td>
					<td>Rp.{{ number_format($datas->nominal) }},-</td>
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
						<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editvoucher" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Ubah</strong></button>
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
<div wire:ignore.self class="modal fade" id="addvoucher" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-dollar-sign"></i> Tambah Voucher</h5>
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
    <label class="text-white" for="">ID Voucher</label>
    <input type="text" name="id_voucher" wire:model="id_voucher" class="form-control" placeholder="Masukkan ID Voucher">
    @error('id_voucher') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Nominal</label>
    <input type="text" name="nominal" wire:model="nominal" class="form-control" placeholder="Masukkan Nominal">
    @error('nominal') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
<div wire:ignore.self class="modal fade" id="editvoucher" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-dollar-sign"></i> Ubah Voucher</h5>
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
    <label class="text-white" for="">ID Voucher</label>
    <input type="text" name="id_voucher" wire:model="id_voucher" class="form-control" placeholder="Masukkan ID Voucher">
    @error('id_voucher') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>

  <div class="form-group">
    <label class="text-white" for="">Nominal</label>
    <input type="text" name="nominal" wire:model="nominal" class="form-control" placeholder="Masukkan Nominal">
    @error('nominal') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
@foreach ($vouchers as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-dollar-sign"></i> {{ $datas->id_voucher }}</h5>
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
