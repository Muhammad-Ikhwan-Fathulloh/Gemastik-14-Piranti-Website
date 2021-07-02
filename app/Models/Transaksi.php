<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'uid',
        'id_destinasi',
        'status',
    ];

    public function allData(){
        return DB::table('transaksis')->get();
    }

    public function allDatas($id){
        return DB::table('transaksis')->where('id', $id)->get();
    }

    public function detailData($id){
    	return DB::table('transaksis')->where('id', $id)->first();
    }

    public function addData($data){
    	DB::table('transaksis')->insert($data);
    }

    public function editData($id, $data){
    	DB::table('transaksis')
    	->where('id', $id)
    	->update($data);
    }

    public function deleteData($id){
    	DB::table('transaksis')
    	->where('id', $id)
    	->delete();
    }
}
