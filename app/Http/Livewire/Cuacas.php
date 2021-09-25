<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cuaca;
use App\Models\Destinasi;
use Livewire\WithPagination;
use Auth;

class Cuacas extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteData($id){
		Cuaca::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}

    public function render()
    {
        if (Auth::user()->level==1) {
            return view('livewire.cuacas', [
                'cuaca' => Cuaca::where('id_destinasi', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10),
                
            ])->layout('cuacak.v_cuacak');
        }elseif (Auth::user()->level==2) {
            $destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
            return view('livewire.cuacas', [
                'cuaca' => Cuaca::where('id_destinasi', $destinasik->id_destinasi)->where('id_destinasi', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10),
                
            ])->layout('cuacak.v_cuacak');
        } 
    }
}
