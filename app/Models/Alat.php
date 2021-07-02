<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_alat',
        'status',
    ];

    public function allData(){
        return DB::table('alats')->get();
    }

    public function allDatas($uid){
        return DB::table('alats')->where('uid', $uid)->get();
    }

    public function detailData($uid){
    	return DB::table('alats')->where('uid', $uid)->first();
    }

    public function addData($data){
    	DB::table('alats')->insert($data);
    }

    public function editData($uid, $data){
    	DB::table('alats')
    	->where('uid', $uid)
    	->update($data);
    }

    public function deleteData($uid){
    	DB::table('alats')
    	->where('uid', $uid)
    	->delete();
    }
}
