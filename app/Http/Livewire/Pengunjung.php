<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Laporandestinasi;
use App\Models\Destinasi;
use Livewire\WithPagination;
use Auth;

class Pengunjung extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tgl_awal;
    public $tgl_akhir;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteData($id){
        Fitur::where('id',$id)->delete();
        session()->flash('pesan','Data Berhasil Dihapus !!!');
    }

    public function render()
    {
    	$destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
    	if (Auth::user()->level==1) {
    		return view('livewire.pengunjung', [
	        	'kunjungan' => Laporandestinasi::where('tanggal', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10),
	        ])->layout('pengunjungs.v_pengunjung');
    	}elseif (Auth::user()->level==2) {
    		return view('livewire.pengunjung', [
	        	'kunjungan' => Laporandestinasi::where('id_destinasi', $destinasik->id_destinasi)->where('tanggal', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10),
	        ])->layout('pengunjungs.v_pengunjung');
    	}
    }
}
