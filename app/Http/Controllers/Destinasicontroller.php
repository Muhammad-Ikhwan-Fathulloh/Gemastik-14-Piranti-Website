<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use Auth;

class Destinasicontroller extends Controller
{
	public function __construct(){
		$this->Destinasi = new Destinasi();
	}

	public function index(Request $request){
    	$data = [
    		'destinasi' => $this->Destinasi->allData(),
    	];

    	return response()->json($data);
    }

    public function indexs($id_destinasi, Request $request){
    	$data = [
    		'destinasi' => $this->Destinasi->allDatas($id_destinasi),
    	];

    	return response()->json($data);
    }

	public function indexcategori($kategori, Request $request){
    	$data = [
    		'destinasicategori' => $this->Destinasi->allDataCategori($kategori),
    	];

    	return response()->json($data);
    }

    public function update($id_destinasi, Request $request){
    	$data = [
            'jumlah_pengunjung' => $request->jumlah_pengunjung,
    	];

    	$this->Destinasi->editData($id_destinasi, $data);

    	return response()->json([
            "message" => "Sukses ubah data".$id_destinasi
        ]);

    }
    
}
