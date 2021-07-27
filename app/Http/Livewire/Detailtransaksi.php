<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Destinasi;
use Livewire\WithPagination;
use Auth;

class Detailtransaksi extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteData($id){
        Transaksi::where('id',$id)->delete();
        session()->flash('pesan','Data Berhasil Dihapus !!!');
    }

    public function statusku($id){
        $Transaksik = Transaksi::where('id',$id)->first();
        $ids = $Transaksik->id;
        $status = $Transaksik->status;
        if ($status==0) {
            Transaksi::where('id', $ids)->update([
            'status' => 1,
            ]);
        }else if($status==1){
            Transaksi::where('id', $ids)->update([
            'status' => 0,
            ]);
        }    
    }

    public function statusk($id){
        $Transaksik = Transaksi::where('id',$id)->first();
        $ids = $Transaksik->id;
        $status = $Transaksik->status;
        if ($status==0) {
            Transaksi::where('id', $ids)->update([
            'status' => 2,
            ]);
        }else if($status==2){
            Transaksi::where('id', $ids)->update([
            'status' => 0,
            ]);
        }    
    }
    public function render()
    {
    	if (Auth::user()->level==1) {
    		return view('livewire.detail-transaksi', [
        	'transaksi' => Transaksi::where('uid', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        	])->layout('transaksi.v_transaksi');
    	}else if (Auth::user()->level==2) {
    		$destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
    		return view('livewire.detail-transaksi', [
        	'transaksi' => Transaksi::where('id_destinasi', $destinasik->id_destinasi)->orderBy('id','DESC')->get(),
        	])->layout('transaksi.v_transaksi');
    	}else if (Auth::user()->level==3) {
    		return view('livewire.detail-transaksi', [
            'transaksi' => Transaksi::where('id_destinasi', 'like', '%'.$this->search.'%')->where('id_user', Auth::user()->id)->orderBy('id','DESC')->paginate(5),
            'transaksik' => Transaksi::where('uid', 'like', '%'.$this->search.'%')->where('transaksis.id_user', Auth::user()->id)->Join('destinasis', 'transaksis.id_destinasi', '=', 'destinasis.id_destinasi')->orderBy('status','DESC')->get(),
            ])->layout('transaksi.v_detailtransaksi');
    	}
    }
}
