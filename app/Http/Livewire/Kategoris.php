<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;

class Kategoris extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $kategori_kecamatan;

	public $ids;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->kategori_kecamatan = '';
    }

    public function SimpanData(){
    	$this->validate([
            'kategori_kecamatan' => 'required',
        ], [
            'kategori_kecamatan.required' => 'Wajib diisi !!',
        ]);

        Kategori::create([
            'kategori_kecamatan' => $this->kategori_kecamatan,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$Kategorik = Kategori::where('id',$id)->first();
		$this->ids = $Kategorik->id;
		$this->kategori_kecamatan = $Kategorik->kategori_kecamatan;
	}

	public function UbahData(){
    	$this->validate([
            'kategori_kecamatan' => 'required',            
        ], [
            'kategori_kecamatan.required' => 'Wajib diisi !!',
        ]);

        Kategori::where('id', $this->ids)->update([
            'kategori_kecamatan' => $this->kategori_kecamatan,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
		
    }

    public function deleteData($id){
		Kategori::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}
    public function render()
    {
        return view('livewire.kategori', [
        	'kategori' => Kategori::where('kategori_kecamatan', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        ])->layout('kategori.v_kategori');
    }
}
