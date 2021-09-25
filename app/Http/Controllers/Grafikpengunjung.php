<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporandestinasi;
use App\Models\Destinasi;
use Auth;

class Grafikpengunjung extends Controller
{
    public function __construct(){
		$this->Laporandestinasi = new Laporandestinasi();
        $this->Destinasi = new Destinasi();
	}

	public function index(Request $request){
        $destinasik = $this->Destinasi->detailData();
    	$laporan = $this->Laporandestinasi->allDatas($destinasik->id_destinasi);
    	$tanggals = [];
    	$pengunjungs = [];
    	$pendapatans = [];
    	foreach ($laporan as $datak) {
    		$tanggals[] = $datak->tanggal;
    		$pengunjungs[] = $datak->jumlah_kunjungan;
    		$pendapatans[] = $datak->pendapatan;
    	}
    	// dd($tanggals);
    	return view('grafik.v_grafikpengunjung', [
    		'tanggal' => $tanggals,
    		'pengunjung' => $pengunjungs,
    		'pendapatan' => $pendapatans,
            'nama' => $destinasik->nama_destinasi,
    	]);
    }
}
