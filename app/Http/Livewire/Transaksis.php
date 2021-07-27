<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Destinasi;
use Livewire\WithPagination;
use Auth;

class Transaksis extends Component
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
            $this->alert('success', 'Berhasil Ubah Statust!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  true, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
        }else if($status==1){
            Transaksi::where('id', $ids)->update([
            'status' => 0,
            ]);
            $this->alert('success', 'Berhasil Ubah Statust!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  true, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
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
            $this->alert('success', 'Berhasil Ubah Statust!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  true, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
        }else if($status==2){
            Transaksi::where('id', $ids)->update([
            'status' => 0,
            ]);
            $this->alert('success', 'Berhasil Ubah Statust!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  true, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
        }    
    }

    public function render()
    {
    	if (Auth::user()->level==1) {
    		return view('livewire.transaksi', [
        	'transaksi' => Transaksi::where('uid', 'like', '%'.$this->search.'%')->where('status', 1)->orderBy('id','DESC')->paginate(5),
        	])->layout('transaksi.v_transaksi');
    	}else if (Auth::user()->level==2) {
    		$destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
    		return view('livewire.transaksi', [
        	'transaksi' => Transaksi::where('uid', 'like', '%'.$this->search.'%')->where('id_destinasi', $destinasik->id_destinasi)->where('status', 1)->orderBy('id','DESC')->paginate(5),
        	])->layout('transaksi.v_transaksi');
    	}else if (Auth::user()->level==3) {
    		return view('livewire.transaksi', [
            'transaksi' => Transaksi::where('uid', 'like', '%'.$this->search.'%')->where('id_user', Auth::user()->id)->orderBy('id','DESC')->paginate(5),
            'transaksik' => Transaksi::where('uid', 'like', '%'.$this->search.'%')->where('transaksis.id_user', Auth::user()->id)->Join('destinasis', 'transaksis.id_destinasi', '=', 'destinasis.id_destinasi')->orderBy('status','ASC')->get(),
            ])->layout('transaksi.v_transaksi');
    	}
    }
}
