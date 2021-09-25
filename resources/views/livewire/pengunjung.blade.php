<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<!--  -->
    <!-- <div class="row">
	  		<div class="form-group row">
	  			<div class="col-sm-6 mb-3 mb-sm-0">
	  				<label class="text-white"><strong>Tanggal Awal :</strong></label>
	  				<input type="date" name="tgl_awal" class="form-control" id="tgl_awal" wire:model="tgl_awal" autocomplete="off" value="{{ date('d-m-Y')}}">
	  			</div>
	  			<div class="col-sm-6">
	  				<label class="text-white"><strong>Tanggal Akhir :</strong></label>
	  				<input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" wire:model="tgl_akhir" autocomplete="off" value="{{ date('d-m-Y')}}">
	  			</div>
	  		</div>
	 </div> -->
	 <!--  -->
	 <hr>
	  	<div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="date('Y-m-d')" name="search" placeholder="Cari berdasarkan Tanggal" aria-label="Search" value="">
          <span class="btn btn-outline-light" value="cari"><i class="fas fa-fw fa-search"></i></span>
        </form>
    </div>
    
    <br>
    <a href="/pengunjung/grafik" class="btn btn-info"><i class="fas fa-fw fa-bars"></i> Grafik</a>
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
				<th>ID Perangkat</th>
				<th>Jumlah Kunjungan</th>
				<th>Pendapatan</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($kunjungan as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_destinasi }}</td>
					<td>{{ $datas->jumlah_kunjungan }} Orang</td>
					<td>Rp.{{ number_format($datas->pendapatan) }},-</td>
					<td>{{ $datas->tanggal }}</td>
					<td>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
	  {{ $kunjungan->links() }}
	  </div>
	</div>

	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($kunjungan as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->id_destinasi }}</h5>
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
