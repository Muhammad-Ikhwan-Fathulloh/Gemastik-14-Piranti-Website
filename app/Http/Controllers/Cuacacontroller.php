<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuaca;
use App\Models\Destinasi;
use Auth;

class Cuacacontroller extends Controller
{
	public function __construct(){
		$this->Cuaca = new Cuaca();
        $this->Destinasi = new Destinasi();
	}

	public function insert(Request $request){
    	$data = [
            'id_destinasi' => $request->id_destinasi,
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
    	];

        $datas = [
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
        ];

    	$this->Cuaca->addData($data);
        $this->Destinasi->editDatas($request->id_destinasi, $datas);

        return response()->json([
            "message" => "Sukses menambah data",
            "data" => $data
        ]);
    }

}
