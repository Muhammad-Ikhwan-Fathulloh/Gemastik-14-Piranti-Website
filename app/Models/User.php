<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    public function editData($id, $data){
        DB::table('users')
        ->where('id', $id)
        ->update($data);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allData(){
        return DB::table('users')->get();
    }

    public function allDatas($id){
        return DB::table('users')->where('id', $id)->get();
    }

    public function allDatax($uid){
        return DB::table('users')->where('uid', $uid)->get();
    }

    public function emaildata($email){
        return DB::table('users')->where('email', $email)->get();
    }

    public function detailData($id){
        return DB::table('users')->where('id', $id)->first();
    }

    public function detailDatas($uid){
        return DB::table('users')->where('uid', $uid)->first();
    }

    public function addData($data){
        DB::table('users')->insert($data);
    }

    public function editDatas($id, $data){
        DB::table('users')
        ->where('id', $id)
        ->update($data);
    }

    public function editDatax($id, $datax){
        DB::table('users')
        ->where('id', $id)
        ->update($datax);
    }

    public function deleteData($id){
        DB::table('users')
        ->where('id', $id)
        ->delete();
    }
}
