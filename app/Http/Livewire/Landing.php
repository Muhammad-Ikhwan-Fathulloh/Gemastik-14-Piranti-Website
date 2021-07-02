<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Transaksi;
use App\Models\User;
use Auth;

class Landing extends Component
{
	public $id_destinasi;
	public $gambar_destinasi;
	public $nama_destinasi;
	public $alamat_destinasi;
	public $harga_destinasi;
	public $kategori_kecamatan;
	public $keterangan_destinasi;
	public $latitude_destinasi;
	public $longitude_destinasi;
	public $suhu;
	public $kelembapan;

	public $ids;

	public function detailData($id){
		$destinasik = Destinasi::where('id',$id)->first();
		$this->ids = $destinasik->id;
		$this->id_destinasi = $destinasik->id_destinasi;
		$this->gambar_destinasi = $destinasik->gambar_destinasi;
		$this->nama_destinasi = $destinasik->nama_destinasi;
		$this->alamat_destinasi = $destinasik->alamat_destinasi;
		$this->harga_destinasi = $destinasik->harga_destinasi;
		$this->kategori_kecamatan = $destinasik->kategori_kecamatan;
		$this->keterangan_destinasi = $destinasik->keterangan_destinasi;
		$this->latitude_destinasi = $destinasik->latitude_destinasi;
		$this->longitude_destinasi = $destinasik->longitude_destinasi;
		$this->suhu = $destinasik->suhu;
		$this->kelembapan = $destinasik->kelembapan;
		
	}

	public function Pesan($id){
		$data = [
			'id_user' => Auth::user()->id,
			'uid' => Auth::user()->uid,
			'id_destinasi' => $this->id_destinasi,
			'status' => 0,
			'saldo' => Auth::user()->saldo - $this->harga_destinasi,
		];

		Transaksi::create([
			'id_user' => Auth::user()->id,
			'uid' => Auth::user()->uid,
			'id_destinasi' => $this->id_destinasi,
			'status' => 0,
		]);
		if (Auth::user()->saldo < $this->harga_destinasi) {
			
		}else{
			User::where('id', Auth::user()->id)->update([
            'saldo' => Auth::user()->saldo - $this->harga_destinasi,
		]);
		}
	}
    public function render()
    {
        return view('livewire.landing', [
        	'destinasi' => Destinasi::orderBy('id','DESC')->get(),
        ])->layout('landing.v_landing');
    }
}
