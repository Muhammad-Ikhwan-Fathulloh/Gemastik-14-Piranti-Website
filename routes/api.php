<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Transaksicontroller;
use App\Http\Controllers\Destinasicontroller;
use App\Http\Controllers\Cuacacontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Topup;
use App\Http\Controllers\Chat;
use App\Http\Controllers\K_kecamatan;
use App\Http\Controllers\K_wisata;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//-------------------------------------------------------------------------
Route::get('/user',[Usercontroller::class, 'index']);
Route::get('/user/{id}',[Usercontroller::class, 'indexs']);
Route::get('/users/{uid}',[Usercontroller::class, 'indexx']);
Route::get('/usersemail/{email}',[Usercontroller::class, 'indexxx']);
Route::post('/user',[Usercontroller::class, 'insert']);
Route::put('/user/{id}',[Usercontroller::class, 'update']);
Route::delete('/user/{id}',[Usercontroller::class, 'delete']);
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
Route::get('/transaksi',[Transaksicontroller::class, 'index']);
Route::get('/transaksi/{uid}',[Transaksicontroller::class, 'indexs']);
Route::post('/transaksi',[Transaksicontroller::class, 'insert']);
Route::put('/transaksi/{id}',[Transaksicontroller::class, 'update']);
Route::delete('/transaksi/{id}',[Transaksicontroller::class, 'delete']);
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
Route::get('/destinasi',[Destinasicontroller::class, 'index']);
Route::get('/destinasi/{id_destinasi}',[Destinasicontroller::class, 'indexs']);
Route::get('/destinasicategori/{kategori}',[Destinasicontroller::class, 'indexcategori']);
Route::post('/destinasi',[Destinasicontroller::class, 'insert']);
Route::put('/destinasi/{id_destinasi}',[Destinasicontroller::class, 'update']);
Route::delete('/destinasi/{id_destinasi}',[Destinasicontroller::class, 'delete']);
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
Route::get('/cuaca/{id_destinasi}',[Cuacacontroller::class, 'indexs']);
Route::post('/cuaca',[Cuacacontroller::class, 'insert']);
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
Route::put('/topup',[Topup::class, 'UbahSaldo']);
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
Route::get('/kategori/kecamatan',[K_kecamatan::class, 'GetKecamatan']);
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
Route::get('/kategori/wisata',[K_wisata::class, 'GetWisata']);
//-------------------------------------------------------------------------