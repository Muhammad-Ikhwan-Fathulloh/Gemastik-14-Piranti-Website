<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use Livewire\WithPagination;

class Destinasis extends Component
{
	public $long;
	public $lat;
	public $geoJson;

	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function __construct(){
		$this->Destinasi = new Destinasi();
	}

	public function maps(){
		return json_encode(Destinasi::get());
	}
	
    public function render()
    {
        return view('livewire.destinasi', [
        	'destinasi' => Destinasi::where('kategori_kecamatan', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(6),
        ])->layout('destinasi.v_destinasi');
    }
}
