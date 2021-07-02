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
    		'destinasi' => $this->Destinasi->allDatas($uid),
    	];

    	return response()->json($data);
    }

    public function update($id_destinasi, Request $request){
    	$data = [
            'uid' => $request->uid,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
    	];

    	$this->Destinasi->editData($id_destinasi, $data);

    	return response()->json([
            "message" => "Sukses ubah data".$id_destinasi
        ]);

    }
    
}
