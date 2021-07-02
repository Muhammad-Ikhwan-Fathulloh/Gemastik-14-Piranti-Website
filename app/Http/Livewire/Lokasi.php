<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;

class Lokasi extends Component
{
	public function maps(){
		return json_encode(Destinasi::get());
	}
	
    public function render()
    {
        return view('livewire.lokasi', [
        	'destinasi' => Destinasi::get(),
        ])->layout('landing.v_landing');
    }
}
