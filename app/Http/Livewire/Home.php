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
        $destinasik = Destinasi::where('id_user', Auth::user()->id)->first();
        if (Auth::user()->level==3) {
            return view('livewire.home', [
                'destinasi' => Destinasi::count(),
                'destinasis' => Destinasi::where('id_user', Auth::user()->id)->count(),
                'transaksi_destinasi' => 0,
                'pendapatan' =>0,
                'transaksis' => Transaksi::where('id_user', Auth::user()->id)->where('status', 1)->count(),
                'transaksi' => Transaksi::where('id_user', Auth::user()->id)->where('status', 0)->count(),
                'transaksik' => Transaksi::where('id_user', Auth::user()->id)->where('status', 2)->count(),
                'kategori' => Kategori::count(),
                'kartu' => Kartu::count(),
                'user' => User::where('level', 3)->count(),
                'voucher' => Voucher::count(),
            ])->layout('home'); 
        }elseif(Auth::user()->level==2){
           return view('livewire.home', [
                'destinasi' => Destinasi::count(),
                'destinasis' => Destinasi::where('id_user', Auth::user()->id)->count(),
                'transaksi_destinasi' => Transaksi::where('id_destinasi', $destinasik->id_destinasi)->where('status', 1)->count(),
                'pendapatan' =>Transaksi::where('id_destinasi', $destinasik->id_destinasi)->where('status', 1)->count() * $destinasik->harga_destinasi,
                'transaksis' => Transaksi::where('id_user', Auth::user()->id)->where('status', 1)->count(),
                'transaksi' => Transaksi::where('id_user', Auth::user()->id)->where('status', 0)->count(),
                'transaksik' => Transaksi::where('id_user', Auth::user()->id)->where('status', 2)->count(),
                'transaksi_master' => Transaksi::where('status', 1)->count(),
                'kategori' => Kategori::count(),
                'kartu' => Kartu::count(),
                'user' => User::where('level', 3)->count(),
                'voucher' => Voucher::count(),
            ])->layout('home'); 
        }else{
            return view('livewire.home', [
                'destinasi' => Destinasi::count(),
                'destinasis' => Destinasi::where('id_user', Auth::user()->id)->count(),
                'transaksi_destinasi' => Transaksi::where('id_destinasi', $destinasik->id_destinasi)->where('status', 1)->count(),
                'pendapatan' =>Transaksi::where('id_destinasi', $destinasik->id_destinasi)->where('status', 1)->count() * $destinasik->harga_destinasi,
                'transaksis' => Transaksi::where('id_user', Auth::user()->id)->where('status', 1)->count(),
                'transaksi' => Transaksi::where('id_user', Auth::user()->id)->where('status', 0)->count(),
                'transaksik' => Transaksi::where('id_user', Auth::user()->id)->where('status', 2)->count(),
                'transaksi_master' => Transaksi::where('status', 1)->count(),
                'kategori' => Kategori::count(),
                'kartu' => Kartu::count(),
                'user' => User::count(),
                'voucher' => Voucher::count(),
            ])->layout('home'); 
        }
    }
}
