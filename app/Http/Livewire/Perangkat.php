<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alat;
use Livewire\WithPagination;

class Perangkat extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $id_alat;
	public $status;

	public $ids;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->id_alat = '';
    }

    public function SimpanData(){
    	$this->validate([
            'id_alat' => 'required',
        ], [
            'id_alat.required' => 'Wajib diisi !!',
        ]);

        Alat::create([
            'id_alat' => $this->id_alat,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$alatk = Alat::where('id',$id)->first();
		$this->ids = $alatk->id;
		$this->id_alat = $alatk->id_alat;
	}

	public function UbahData(){
    	$this->validate([
            'id_alat' => 'required',            
        ], [
            'id_alat.required' => 'Wajib diisi !!',
        ]);

        Alat::where('id', $this->ids)->update([
            'id_alat' => $this->id_alat,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
		
    }

    public function deleteData($id){
		Alat::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}


    public function render()
    {
        return view('livewire.perangkat', [
        	'perangkat' => Alat::where('id_alat', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        ])->layout('perangkat.v_perangkat');
    }
}
