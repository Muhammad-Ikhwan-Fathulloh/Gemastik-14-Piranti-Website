<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Destinasi extends Model
{
	protected $table = "destinasis";
	protected $guarded = [];
    use HasFactory;

    public function allData(){
    	return DB::table('destinasis')->get();
    }

    public function allDatas($id_destinasi){
    	return DB::table('destinasis')->where('id_destinasi', $id_destinasi)->get();
    }

    public function allDataCategori($kategori){
    	return DB::table('destinasis')->where('kategori_wisata', $kategori)->get();
    }

    public function detailDatas($id_destinasi){
        return DB::table('destinasis')->where('id_destinasi', $id_destinasi)->first();
    }

    public function detailData(){
        return DB::table('destinasis')->where('id_user', Auth::user()->id)->first();
    }

    public function editData($id_destinasi, $data){
    	DB::table('destinasis')
    	->where('id_destinasi', $id_destinasi)
    	->update($data);
    }

    public function editDatas($id_destinasi, $datas){
        DB::table('destinasis')
        ->where('id_destinasi', $id_destinasi)
        ->update($datas);
    }
}
