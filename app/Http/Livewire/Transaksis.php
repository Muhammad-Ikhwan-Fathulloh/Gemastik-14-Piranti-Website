<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Destinasi;
use Auth;

class Transaksis extends Component
{
    public function render()
    {
    	if (Auth::user()->level==1) {
    		return view('livewire.transaksi', [
        	'transaksi' => Transaksi::orderBy('id','DESC')->get(),
        	])->layout('transaksi.v_transaksi');
    	}else if (Auth::user()->level==2) {
    		$destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
    		return view('livewire.transaksi', [
        	'transaksi' => Transaksi::where('id_destinasi', $destinasik->id_destinasi)->orderBy('id','DESC')->get(),
        	])->layout('transaksi.v_transaksi');
    	}else if (Auth::user()->level==3) {
    		return view('livewire.transaksi', [
            'transaksi' => Transaksi::where('id_user', Auth::user()->id)->where('status', 0)->orderBy('id','DESC')->get(),
            'transaksis' => Transaksi::where('status', 1)->orderBy('id','DESC')->get(),
            ])->layout('transaksi.v_transaksi');
    	}
    }
}
