<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Grafikcuaca extends Component
{
    public function render()
    {
        return view('livewire.grafikcuaca')->layout('grafik.v_grafikcuaca');
    }
}
