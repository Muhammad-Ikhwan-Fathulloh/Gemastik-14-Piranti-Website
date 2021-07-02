<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Profile extends Component
{
	public $detailUser;
	//public $id;
	//--------------------------------------
	public $name;
	public $username;
	public $foto;
	public $uid;
	public $email;
	public $password;
	public $tempat_lahir;
	public $tanggal_lahir;
	public $alamat;
	public $nohp;
    public $saldo;
	public $latitude_user;
	public $longitude_user;
	//--------------------------------------
	public $names;
	public $usernames;
	public $fotos;
	//public $uids;
	public $emails;
	public $passwords;
	public $tempat_lahirs;
	public $tanggal_lahirs;
	public $alamats;
	public $nohps;
    public $saldos;
	public $latitude_users;
	public $longitude_users;

    public function render()
    {
    	$detailUser = User::where('id', Auth::user()->id)->first();
    	$this->name = $detailUser->name;
    	$this->username = $detailUser->username;
    	$this->foto = $detailUser->foto;
    	$this->uid = $detailUser->uid;
    	$this->email = $detailUser->email;
    	$this->password = $detailUser->password;
    	$this->tempat_lahir = $detailUser->tempat_lahir;
    	$this->tanggal_lahir = $detailUser->tanggal_lahir;
    	$this->alamat = $detailUser->alamat;
    	$this->nohp = $detailUser->nohp;
        $this->saldo = $detailUser->saldo;
    	$this->latitude_user = $detailUser->latitude_user;
    	$this->longitude_user = $detailUser->longitude_user;

        return view('livewire.profile')->layout('profile.v_profile');
    }

    

    public function SimpanData(){
		User::where('id', Auth::user()->id)->update([
			'name' => $this->names,
			'username' => $this->usernames,
			'foto' => $this->fotos,
            'tempat_lahir' => $this->tempat_lahirs,
            'tanggal_lahir' => $this->tanggal_lahirs,
            'alamat' => $this->alamats,
            'nohp' => $this->nohps,
            'latitude_user' => $this->latitude_users,
            'longitude_user' => $this->longitude_users,
		]);
	}

    public function DetailData(){
    	$detailUser = User::where('id', Auth::user()->id)->first();
    	$this->names = $detailUser->name;
    	$this->usernames = $detailUser->username;
    	$this->fotos = $detailUser->foto;
    	$this->uids = $detailUser->uid;
    	$this->emails = $detailUser->email;
    	$this->passwords = $detailUser->password;
    	$this->tempat_lahirs = $detailUser->tempat_lahir;
    	$this->tanggal_lahirs = $detailUser->tanggal_lahir;
    	$this->alamats = $detailUser->alamat;
    	$this->nohps = $detailUser->nohp;
    	$this->latitude_users = $detailUser->latitude_user;
    	$this->longitude_users = $detailUser->longitude_user;

    }

    public function deleteData($id){
        User::where('id',$id)->delete();
        session()->flash('pesan','Data Berhasil Dihapus !!!');
    }

}
