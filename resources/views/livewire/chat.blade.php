<div>
    {{-- Do your work, then step back. --}}
    @if(auth()->user()->level==1)
    <div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Komentar" aria-label="Search" value="">
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
				<th>ID Pesan</th>
				<th>ID User</th>
				<th>Pesan</th>
				<th>File</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($pesand as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_pesan }}</td>
					<td>{{ $datas->id_user }}</td>
					<td>{{ $datas->pesan }}</td>
					<td>{{ $datas->file }}</td>
					<td>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>

			@endforeach


		</tbody>
	</table>
	  </div>
    {{ $pesand->links() }}
	  </div>
	</div>

  <div class="card bg-ku" wire:poll>
      <div class="card-body">
        <div class="form-group">
                  <textarea type="text" name="pesan" wire:model="pesan" class="form-control" placeholder="Masukkan Pesan" rows="3"></textarea>
                  @error('pesan') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <textarea type="text" name="file" wire:model="file" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
                  @error('file') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <hr>
                <div class="form-group">
            <select class="custom-select" id="inputGroupSelect01" type="text" name="kategori_kecamatan" wire:model="kategori_kecamatan">
              <option selected>------- Kecamatan -------</option>
              @foreach ($kecamatan as $datas)      
              <option value="{{$datas->kategori_kecamatan}}">{{$datas->kategori_kecamatan}}</option>
              @endforeach
            </select>
            <br><br>
              <select class="custom-select" id="inputGroupSelect01" type="text" name="id_pesan" wire:model="id_pesan">
              <option selected>------- Pesan -------</option>
              @foreach ($userk as $dataa)
              @foreach ($userb as $datad)
              @if($dataa->id == $datad->id_user)
              <option value="{{$datad->id}}">{{$dataa->name}} | {{$datad->nama_destinasi}} | {{$datad->kategori_kecamatan}}</option>
              @endif
              @endforeach
              @endforeach
            </select>

              @error('id_pesan') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#" wire:click.prevent="SimpanData()"><i class="fas fa-fw fa-comments"></i> <strong>Kirim</strong></button>
      </div>
    </div>
    <hr>
    <div wire:poll>
    @foreach ($pesank as $datax)
    <p align="right" class="text-white">
    @if($idpesan == $datax->id_pesan)
      @if($datax->level == 1)
      Admin
      @elseif($datax->level == 2)
      Pengelola Destinasi
      @elseif($datax->level == 3)
      Wisatawan
      @endif
     | {{ $datax->name }} <img class="img-profile rounded-circle" src="{{ $datax->foto }}" width="40px"></p>
        <div class="form-group">
          <textarea type="text" name="pesan" class="form-control" placeholder="Masukkan Komentar" rows="2" readonly="">{{ $datax->pesan }}</textarea>
          
      <div class="form-group">
          <a href="{{ $datax->file }}" class="btn btn-info">File</a>
        </div>
        @endif
      @endforeach
    </div>
@else
<div class="card bg-ku" wire:poll>
      <div class="card-body">
      	<div class="form-group">
                  <textarea type="text" name="pesan" wire:model="pesan" class="form-control" placeholder="Masukkan Pesan" rows="3"></textarea>
                  @error('pesan') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <textarea type="text" name="file" wire:model="file" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
                  @error('file') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <hr>
                <div class="form-group">
            <select class="custom-select" id="inputGroupSelect01" type="text" name="kategori_kecamatan" wire:model="kategori_kecamatan">
              <option selected>------- Kecamatan -------</option>
              @foreach ($kecamatan as $datas)      
              <option value="{{$datas->kategori_kecamatan}}">{{$datas->kategori_kecamatan}}</option>
              @endforeach
            </select>
            <br><br>
		          <select class="custom-select" id="inputGroupSelect01" type="text" name="id_pesan" wire:model="id_pesan">
		          <option selected>------- Pesan -------</option>
		          @foreach ($userk as $dataa)
		          @foreach ($userb as $datad)
		          @if($dataa->id == $datad->id_user)
		          <option value="{{$datad->id}}">{{$dataa->name}} | {{$datad->nama_destinasi}} | {{$datad->kategori_kecamatan}}</option>
		          @endif
		          @endforeach
		          @endforeach
		        </select>

		          @error('id_pesan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		        </div>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#" wire:click.prevent="SimpanData()"><i class="fas fa-fw fa-comments"></i> <strong>Kirim</strong></button>
      </div>
    </div>
    <hr>
    <div wire:poll>
    @foreach ($pesank as $datax)
    <p align="right" class="text-white">
    @if($idpesan == $datax->id_pesan)
      @if($datax->level == 1)
      Admin
      @elseif($datax->level == 2)
      Pengelola Destinasi
      @elseif($datax->level == 3)
      Wisatawan
      @endif
     | {{ $datax->name }} <img class="img-profile rounded-circle" src="{{ $datax->foto }}" width="40px"></p>
        <div class="form-group">
          <textarea type="text" name="pesan" class="form-control" placeholder="Masukkan Komentar" rows="2" readonly="">{{ $datax->pesan }}</textarea>
          
	    <div class="form-group">
          <a href="{{ $datax->file }}" class="btn btn-info">File</a>
        </div>
        @endif
      @endforeach
    </div>
	
@endif
	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($pesank as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->pesan }}</h5>
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



				
