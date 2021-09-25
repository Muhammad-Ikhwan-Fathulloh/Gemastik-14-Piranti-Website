<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorikota;

class K_wisata extends Controller
{
    public function __construct(){
    	$this->Kategorikota = new Kategorikota();
    }

    public function GetWisata(){
    	$data = [
    		'Kategorikota' => $this->Kategorikota->allData(),
    	];

    	return response()->json($data);
    }
}
