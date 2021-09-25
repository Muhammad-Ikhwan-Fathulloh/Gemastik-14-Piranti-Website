<div>
    {{-- Be like water. --}}
    
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	
	  	<!--  -->
	  	<form wire:submit.prevent="SimpanData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
			  <div class="form-group">
			    <label class="text-white" for="">Nama Lengkap</label>
			    <input type="text" name="name" wire:model="name" class="form-control" placeholder="Masukkan Nama Lengkap" readonly="">
			    @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>
			  <div class="form-group">
			    <label class="text-white" for="">Nama Panggilan</label>
			    <input type="text" name="username" wire:model="username" class="form-control" placeholder="Masukkan Nama Panggilan" readonly="">
			    @error('username') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>


			  <div class="form-group">
			    <label class="text-white" for="">Foto</label>
			    <br>
			    <img src="{{ $fotok }}" class="rounded-circle" width="150px">
			    <hr>
			    <input type="text" name="foto" wire:model="foto" class="form-control" placeholder="Upload Foto" readonly="">
			    @error('foto') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">UID Kartu</label>
			    <input type="text" name="uid" wire:model="uid" class="form-control" placeholder="Scan UID Kartu" readonly="">
			    @error('uid') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Email</label>
			    <input type="text" name="email" wire:model="email" class="form-control" placeholder="Masukkan Email" readonly="">
			    @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <!-- <div class="form-group">
			    <label class="text-white" for="">Password</label>
			    <input type="text" name="password" wire:model="password" class="form-control" placeholder="Masukkan Password" readonly="">
			    @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div> -->

			  <div class="form-group">
			    <label class="text-white" for="">Saldo</label>
			    <input type="text" name="saldo" wire:model="saldo" class="form-control" placeholder="Masukkan Saldo" readonly="">
			    @error('saldo') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Tempat Lahir</label>
			    <input type="text" name="tempat_lahir" wire:model="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" readonly="">
			    @error('tempat_lahir') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Tanggal Lahir</label>
			    <input type="date" name="tanggal_lahir" wire:model="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" readonly="">
			    @error('tanggal_lahir') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Alamat</label>
			    <input type="text" name="alamat" wire:model="alamat" class="form-control" placeholder="Masukkan Alamat" readonly="">
			    @error('alamat') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">No Handphone</label>
			    <input type="text" name="nohp" wire:model="nohp" class="form-control" placeholder="Masukkan No Handphone" readonly="">
			    @error('nohp') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Latitude</label>
			    <input type="text" name="latitude_user" wire:model="latitude_user" class="form-control" placeholder="Masukkan Latitude" readonly="">
			    @error('latitude_user') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Longitude</label>
			    <input type="text" name="longitude_user" wire:model="longitude_user" class="form-control" placeholder="Masukkan Longitude" readonly="">
			    @error('longitude_user') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>
			  
			  <button class="btn btn-sm btn-light" data-toggle="modal" data-target="#profile" wire:click.prevent="DetailData()"><i class="fas fa-fw fa-pen"></i> <strong>Ubah Profile</strong></button>
			</form>
			<!--  -->
	  </div>
	 </div>

	 <!--  -->
	 <!-- Tambah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="profile" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-user"></i> Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-ku">
<form wire:submit.prevent="SimpanData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
			  <div class="form-group">
			    <label class="text-white" for="">Nama Lengkap</label>
			    <input type="text" name="name" wire:model="names" class="form-control" placeholder="Masukkan Nama Lengkap" readonly="">
			    @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>
			  <div class="form-group">
			    <label class="text-white" for="">Nama Panggilan</label>
			    <input type="text" name="username" wire:model="usernames" class="form-control" placeholder="Masukkan Nama Panggilan">
			    @error('username') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Foto</label>
			    <input type="text" name="foto" wire:model="fotos" class="form-control" placeholder="Upload Foto">
			    @error('foto') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Tempat Lahir</label>
			    <input type="text" name="tempat_lahir" wire:model="tempat_lahirs" class="form-control" placeholder="Masukkan Tempat Lahir">
			    @error('tempat_lahir') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Tanggal Lahir</label>
			    <input type="date" name="tanggal_lahir" wire:model="tanggal_lahirs" class="form-control" placeholder="Masukkan Tanggal Lahir">
			    @error('tanggal_lahir') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Alamat</label>
			    <input type="text" name="alamat" wire:model="alamats" class="form-control" placeholder="Masukkan Alamat">
			    @error('alamat') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">No Handphone</label>
			    <input type="text" name="nohp" wire:model="nohps" class="form-control" placeholder="Masukkan No Handphone">
			    @error('nohp') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Latitude</label>
			    <input type="text" name="latitude_user" wire:model="latitude_users" class="form-control" placeholder="Masukkan Latitude">
			    @error('latitude_user') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Longitude</label>
			    <input type="text" name="longitude_user" wire:model="longitude_users" class="form-control" placeholder="Masukkan Longitude">
			    @error('longitude_user') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>
			  
			
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark" wire:submit.prevent="SimpanData()">Ubah</button>
      </div>
    </div>
  </div>
</div>
</form>
	 <!--  -->

</div>

<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        //alert(content);
        $("#uids").val(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      let scanners = new Instascan.Scanner({ video: document.getElementById('previews') });
      scanners.addListener('scan', function (contentk) {
        //alert(content);
        $("#uids").val(contentk);
      });
      Instascan.Camera.getCameras().then(function (camerak) {
        if (camerak.length > 0) {
          scanners.start(camerak[1]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
</script>
