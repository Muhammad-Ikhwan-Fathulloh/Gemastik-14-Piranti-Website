<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Laporandestinasi;
use App\Models\Destinasi;
use Auth;

class Grafikpengunjung extends Component
{
    public function render()
    {
    	$destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
    	$laporank = Laporandestinasi::where('id_destinasi', $destinasik->id_destinasi)->get();
    	$tanggals = [];
    	foreach ($laporank as $datak) {
    		$tanggals[] = $datak->tanggal;
    	}
    	//dd($tanggals);
        return view('livewire.grafikpengunjung', [
        	'tanggal' => $tanggals,
        ])->layout('grafik.v_grafikpengunjung');
    }
}
