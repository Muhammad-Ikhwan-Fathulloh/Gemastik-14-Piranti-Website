<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_voucher',
        'nominal',
        'status',
    ];

    public function allData(){
        return DB::table('vouchers')->get();
    }

    public function detailData($id_voucher){
    	return DB::table('vouchers')->where('id_voucher', $id_voucher)->first();
    }

    public function deleteData($id){
    	DB::table('vouchers')
    	->where('id', $id)
    	->delete();
    }
}
