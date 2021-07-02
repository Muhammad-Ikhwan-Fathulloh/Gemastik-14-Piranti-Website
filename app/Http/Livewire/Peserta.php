<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Peserta extends Component
{
	public $mode;
    public function render()
    {
        return view('livewire.peserta', [
        	'users' => User::orderBy('id','DESC')->get(),
        ])->layout('peserta.v_peserta');
    }
}
