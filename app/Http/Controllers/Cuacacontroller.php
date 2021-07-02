<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuaca;
use Auth;

class Cuacacontroller extends Controller
{
	public function __construct(){
		$this->Cuaca = new Cuaca();
	}

	public function insert(Request $request){
    	$data = [
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
    	];

    	$this->Cuaca->addData($data);

        return response()->json([
            "message" => "Sukses menambah data",
            "data" => $data
        ]);
    }

}
