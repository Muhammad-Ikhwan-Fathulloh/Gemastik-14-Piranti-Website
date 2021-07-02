<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Usercontroller extends Controller
{
    public function __construct(){
		$this->User = new User();
	}

	public function index(Request $request){
    	$data = [
    		'user' => $this->User->allData(),
    	];

    	return response()->json($data);
    }

    public function indexs($uid, Request $request){
    	$data = [
    		'user' => $this->User->allDatas($uid),
    	];

    	return response()->json($data);
    }

    public function update($uid, Request $request){
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

    	$this->User->editDatas($uid, $data);

    	return response()->json([
            "message" => "Sukses ubah data".$uid
        ]);

    }
}
