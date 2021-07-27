<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Peserta extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $mode;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function statusku($id){
        $userk = User::where('id',$id)->first();
        $ids = $userk->id;
        $status = $userk->status;
        if ($status==0) {
            User::where('id', $ids)->update([
            'status' => 1,
            ]);
        }else if($status==1){
            User::where('id', $ids)->update([
            'status' => 0,
            ]);
        }
        
    }

    public function deleteData($id){
        User::where('id',$id)->delete();
        session()->flash('pesan','Data Berhasil Dihapus !!!');
    }

    public function render()
    {
        return view('livewire.peserta', [
        	'users' => User::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        ])->layout('peserta.v_peserta');
    }
}
