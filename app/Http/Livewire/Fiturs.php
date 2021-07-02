<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fitur;

class Fiturs extends Component
{
	public $judul;
	public $gambar;
	public $fitur;
	public $keterangan;

	public $ids;

	public function clearform(){
        $this->judul = '';
        $this->gambar = '';
        $this->fitur = '';
        $this->keterangan = '';
    }

    public function SimpanData(){
    	$this->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'fitur' => 'required',
            'keterangan' => 'required',
        ], [
            'judul.required' => 'Wajib diisi !!',
            'gambar.required' => 'Wajib diisi !!',
            'fitur.required' => 'Wajib diisi !!',
            'keterangan.required' => 'Wajib diisi !!',
        ]);

        Fitur::create([
            'judul' => $this->judul,
            'gambar' => $this->gambar,
            'fitur' => $this->fitur,
            'keterangan' => $this->keterangan,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$Fiturk = Fitur::where('id',$id)->first();
		$this->ids = $Fiturk->id;
		$this->judul = $Fiturk->judul;
		$this->gambar = $Fiturk->gambar;
		$this->fitur = $Fiturk->fitur;
		$this->keterangan = $Fiturk->keterangan;
	}

	public function UbahData(){
    	$this->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'fitur' => 'required',
            'keterangan' => 'required',
        ], [
            'judul.required' => 'Wajib diisi !!',
            'gambar.required' => 'Wajib diisi !!',
            'fitur.required' => 'Wajib diisi !!',
            'keterangan.required' => 'Wajib diisi !!',
        ]);

        Fitur::where('id', $this->ids)->update([
            'judul' => $this->judul,
            'gambar' => $this->gambar,
            'fitur' => $this->fitur,
            'keterangan' => $this->keterangan,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
		
    }

    public function deleteData($id){
		Fitur::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}

    public function render()
    {
        return view('livewire.fiturs', [
        	'fiturs' => Fitur::get(),
        ])->layout('fitur.v_fitur');
    }
}
