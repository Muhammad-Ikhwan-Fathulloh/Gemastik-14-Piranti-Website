<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
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
	  	<div class="table-responsive" wire:poll>
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
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click="">
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
							  @elseif($datas->status == 1)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click="" checked>
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
							  @endif
							</div>
		              	@elseif (auth()->user()->level==2)
		                   	<div class="form-check form-switch" align="right">
							  @if($datas->status == 0)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click="">
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">OFF</strong></label> -->
							  @elseif($datas->status == 1)
							  <input class="form-check-input border-info" type="checkbox" name="model" id="mode1" wire:click="" checked>
							  <!-- <label class="form-check-label text-white" for="model"><strong>Mode Presensi</strong> <strong class="text-info">ON</strong></label> -->
							  @endif
							</div>
		              	@elseif (auth()->user()->level==3)
		                    @if($datas->status == 0)
		                    	Belum Terpakai
		                    @elseif($datas->status == 1)
		                    	Sudah Terpakai
		                    @endif
		              	@endif
						
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
</div>
