<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kartu;

class Kartuscan extends Component
{
	public $uid;
	public $status;

	public $ids;

	public function clearform(){
        $this->uid = '';
    }

    public function SimpanData(){
    	$this->validate([
            'uid' => 'required',
        ], [
            'uid.required' => 'Wajib diisi !!',
        ]);

        Kartu::create([
            'uid' => $this->uid,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$Kartuk = Kartu::where('id',$id)->first();
		$this->ids = $Kartuk->id;
		$this->uid = $Kartuk->uid;
	}

	public function UbahData(){
    	$this->validate([
            'uid' => 'required',            
        ], [
            'uid.required' => 'Wajib diisi !!',
        ]);

        Kartu::where('id', $this->ids)->update([
            'uid' => $this->uid,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
		
    }

    public function deleteData($id){
		Kartu::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}

    public function render()
    {
        return view('livewire.kartuscan', [
        	'kartu' => Kartu::orderBy('id','DESC')->get(),
        ])->layout('kartu.v_kartu');
    }
}
