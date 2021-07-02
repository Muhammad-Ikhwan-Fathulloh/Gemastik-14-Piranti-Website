<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Destinasi extends Model
{
	protected $table = "destinasis";
	protected $guarded = [];
    use HasFactory;

    public function allData(){
    	return DB::table('destinasis')->get();
    }

    public function detailData($id_destinasi){
    	return DB::table('destinasis')->where('id_destinasi', $id_destinasi)->get();
    }

    public function editData($id_destinasi, $data){
    	DB::table('destinasis')
    	->where('id_destinasi', $id_destinasi)
    	->update($data);
    }
}
