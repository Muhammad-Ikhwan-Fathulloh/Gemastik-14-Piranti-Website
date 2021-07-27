<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <br>
<h4 class="text-white"><i class="fas fa-fw fa-tasks"></i> Fitur Destinasi Skut Bandung</h4>
<hr>
<div class="row row-cols-1 row-cols-md-3 g-4" wire:poll>
@foreach ($fiturs as $datas)
<div class="col">
	<div class="card bg-b">
      <img src="{{ $datas->gambar }}" class="card-img-top rounded" width="250px">
      <div class="card-body">
        <h5 class="card-title text-white"><strong>{{ $datas->judul }}</strong></h5>
        <hr class="text-white">
        <p class="card-title text-white"><strong>Keterangan :</strong> {{ $datas->keterangan }}</p>
      
        <div class="text-white">
 
        </div>
        
      </div>
    </div>
</div>
@endforeach
</div>
</div>
