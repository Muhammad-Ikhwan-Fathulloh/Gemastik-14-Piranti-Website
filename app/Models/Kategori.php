<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_kecamatan',
        'kategori_kota',
    ];

    public function allData(){
    	return DB::table('kategoris')->get();
    }
}
