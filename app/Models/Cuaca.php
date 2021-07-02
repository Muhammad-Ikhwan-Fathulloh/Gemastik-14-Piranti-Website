<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cuaca extends Model
{
    use HasFactory;

    public function allData(){
        return DB::table('cuacas')->get();
    }

    public function allDatas($id){
        return DB::table('cuacas')->where('id', $id)->get();
    }

    public function detailData($id){
    	return DB::table('cuacas')->where('id', $id)->first();
    }

    public function addData($data){
    	DB::table('cuacas')->insert($data);
    }

    public function editData($id, $data){
    	DB::table('cuacas')
    	->where('id', $id)
    	->update($data);
    }

    public function deleteData($id){
    	DB::table('cuacas')
    	->where('id', $id)
    	->delete();
    }
}
