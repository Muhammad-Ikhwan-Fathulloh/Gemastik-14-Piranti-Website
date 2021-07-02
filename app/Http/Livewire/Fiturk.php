<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fitur;

class Fiturk extends Component
{
    public function render()
    {
        return view('livewire.fiturk', [
        	'fiturs' => Fitur::get(),
        ])->layout('fitur.v_fiturs');
    }
}
