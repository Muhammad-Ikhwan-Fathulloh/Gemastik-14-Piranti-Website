<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategoriwisata;
use Livewire\WithPagination;

class Wisata extends Component
{
    public function render()
    {
        return view('livewire.wisata');
    }
}
