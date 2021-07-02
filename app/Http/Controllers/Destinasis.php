<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class Destinasis extends Controller
{
    public function __construct(){
		$this->Destinasi = new Destinasi();
	}
	public function maps(){
		return json_encode($this->Destinasi->allData());
	}

	public function detail($id){
		$this->Destinasi->detailData($id);
		return json_encode($this->Destinasi->detailData($id));
	}
}
