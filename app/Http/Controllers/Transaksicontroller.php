<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Auth;

class Transaksicontroller extends Controller
{
	public function __construct(){
		$this->Transaksi = new Transaksi();
	}

	public function index(Request $request){
    	$data = [
    		'transaksi' => $this->Transaksi->allData(),
    	];

    	return response()->json($data);
    }

    public function indexs($id, Request $request){
    	$data = [
    		'transaksi' => $this->Transaksi->allDatas($uid),
    	];

    	return response()->json($data);
    }

    public function update($id, Request $request){
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

    	$this->Transaksi->editData($id, $data);

    	return response()->json([
            "message" => "Sukses ubah data".$id
        ]);

    }
   
}
