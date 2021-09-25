<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategorikota;
use Livewire\WithPagination;

class Kategorikotas extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $kategori_wisata;

	public $ids;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->kategori_wisata = '';
    }

    public function SimpanData(){
    	$this->validate([
            'kategori_wisata' => 'required',
        ], [
            'kategori_wisata.required' => 'Wajib diisi !!',
        ]);

        Kategorikota::create([
            'kategori_wisata' => $this->kategori_wisata,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$Kategorik = Kategorikota::where('id',$id)->first();
		$this->ids = $Kategorik->id;
        $this->kategori_wisata = $Kategorik->kategori_wisata;
	}

	public function UbahData(){
    	$this->validate([
            'kategori_wisata' => 'required',            
        ], [
            'kategori_wisata.required' => 'Wajib diisi !!',
        ]);

        Kategorikota::where('id', $this->ids)->update([
            'kategori_wisata' => $this->kategori_wisata,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
		
    }

    public function deleteData($id){
		Kategorikota::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}
    public function render()
    {
        return view('livewire.kategori-kota', [
        	'kategori' => Kategorikota::where('kategori_wisata', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        ])->layout('kategori.v_kategorikota');
    }
}
