<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Kartu;
use App\Models\Alat;
use App\Models\Voucher;
use App\Models\Kategori;
use App\Models\Peserta;
use App\Models\Fitur;
use Auth;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
        	'destinasi' => Destinasi::count(),
        	'destinasis' => Destinasi::where('id_user', Auth::user()->id)->count(),
        	'transaksis' => Transaksi::where('status', 1)->count(),
        	'transaksi' => Transaksi::where('status', 0)->count(),
        	'kategori' => Kategori::count(),
        	'kartu' => Kartu::count(),
        	'user' => User::count(),
        	'voucher' => Voucher::count(),
        ])->layout('home');
    }
}
