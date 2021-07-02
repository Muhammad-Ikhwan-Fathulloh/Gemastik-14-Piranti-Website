<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Topup extends Component
{
    public function render()
    {
        return view('livewire.topup')->layout('voucher.v_topup');
    }
}
