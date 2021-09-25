<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategoriwisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_kota',
    ];

    public function allData(){
        return DB::table('kategorikotas')->get();
    }
}
