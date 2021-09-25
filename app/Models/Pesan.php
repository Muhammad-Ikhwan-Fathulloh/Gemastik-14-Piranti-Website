<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_pesan',
    	'id_user',
        'pesan',
        'file',
    ];

    public function allData(){
        return DB::table('pesans')->get();
    }

    public function addData($data){
    	return DB::table('pesans')->insert($data);
    }

}
