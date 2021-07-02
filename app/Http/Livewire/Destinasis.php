<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;

class Destinasis extends Component
{
	public $long;
	public $lat;
	public $geoJson;

	public function __construct(){
		$this->Destinasi = new Destinasi();
	}

	public function maps(){
		return json_encode(Destinasi::get());
	}
	
    public function render()
    {
        return view('livewire.destinasi', [
        	'destinasi' => Destinasi::get(),
        ])->layout('destinasi.v_destinasi');
    }
}
