<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class Chat extends Controller
{
    public function __construct(){
    	$this->Pesan = new Pesan();
    }

    public function GetChat(){
    	$data = [
    		'Pesan' => $this->Pesan->allData(),
    	];

    	return response()->json($data);
    }

    public function AddChat(){
    	
    }
}
