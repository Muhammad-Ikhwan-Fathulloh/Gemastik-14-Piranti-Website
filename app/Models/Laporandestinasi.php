<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporandestinasi extends Model
{
    protected $table = "laporandestinasis";
	protected $guarded = [];
    use HasFactory;

    protected $fillable = [
        'id_destinasi',
        'jumlah_kunjungan',
        'pendapatan',
        'tanggal',
    ];

    public function allData(){
    	return DB::table('laporandestinasis')->get();
    }

    public function allDatas($id_destinasi){
    	return DB::table('laporandestinasis')->where('id_destinasi', $id_destinasi)->get();
    }

    public function detailDatak($id_destinasi, $tanggal){
        return DB::table('laporandestinasis')->where('id_destinasi', $id_destinasi)->where('tanggal', $tanggal)->first();
    }

    public function detailDatas($id_destinasi){
        return DB::table('laporandestinasis')->where('id_destinasi', $id_destinasi)->first();
    }

    public function addDatak($data_kunjungan){
    	DB::table('laporandestinasis')->insert($data_kunjungan);
    }

    public function editDatak($id_destinasi, $tanggal, $data_kunjungan){
    	DB::table('laporandestinasis')
    	->where('id_destinasi', $id_destinasi)
    	->where('tanggal', $tanggal)
    	->update($data_kunjungan);
    }
}
