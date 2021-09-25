<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuaca;
use App\Models\Destinasi;
use Auth;

class Grafikcuaca extends Controller
{
	public function __construct(){
		$this->Cuaca = new Cuaca();
		$this->Destinasi = new Destinasi();
	}

	public function index(Request $request){
		$destinasik = $this->Destinasi->detailData();
    	$laporan = $this->Cuaca->allDatak($destinasik->id_destinasi);
    	$tanggals = [];
    	$suhus = [];
    	$kelembapans = [];
    	foreach ($laporan as $datak) {
    		$tanggals[] = $datak->created_at;
    		$suhus[] = $datak->suhu;
    		$kelembapans[] = $datak->kelembapan;
    	}

    	return view('grafik.v_grafikcuaca', [
    		'tanggal' => $tanggals,
    		'suhu' => $suhus,
    		'kelembapan' => $kelembapans,
    		'nama' => $destinasik->nama_destinasi,
    	]);
    }

}