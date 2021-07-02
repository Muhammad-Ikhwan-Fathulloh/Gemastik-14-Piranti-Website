<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cuaca;

class Cuacas extends Component
{
    public function render()
    {
        return view('livewire.cuacas', [
        	'cuaca' => Cuaca::get(),
        ])->layout('cuacak.v_cuacak');
    }
}
