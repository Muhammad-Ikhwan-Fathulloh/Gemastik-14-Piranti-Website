<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class K_kecamatan extends Controller
{
    public function __construct(){
    	$this->Kategori = new Kategori();
    }

    public function GetKecamatan(){
    	$data = [
    		'Kategori' => $this->Kategori->allData(),
    	];

    	return response()->json($data);
    }
}
