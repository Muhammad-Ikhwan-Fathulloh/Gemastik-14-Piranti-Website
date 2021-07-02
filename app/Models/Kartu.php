<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kartu extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'status',
    ];

    public function allData(){
        return DB::table('kartu')->get();
    }

    public function allDatas($uid){
        return DB::table('kartu')->where('uid', $uid)->get();
    }

    public function detailData($uid){
    	return DB::table('kartu')->where('uid', $uid)->first();
    }

    public function addData($data){
    	DB::table('kartu')->insert($data);
    }

    public function editData($uid, $data){
    	DB::table('kartu')
    	->where('uid', $uid)
    	->update($data);
    }

    public function deleteData($uid){
    	DB::table('kartu')
    	->where('uid', $uid)
    	->delete();
    }
}
