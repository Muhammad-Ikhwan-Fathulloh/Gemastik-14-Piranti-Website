<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\livewire\Profile;
use App\Http\livewire\Peserta;
use App\Http\livewire\Vouchers;
use App\Http\livewire\Destinasis;
use App\Http\livewire\Destinasik;
use App\Http\livewire\Topup;
use App\Http\livewire\Chat;
use App\Http\livewire\Transaksis;
use App\Http\livewire\Detailtransaksi;
use App\Http\livewire\Pengunjung;
use App\Http\livewire\Landing;
use App\Http\livewire\Lokasi;
use App\Http\livewire\Kategoris;
use App\Http\livewire\Kategorikotas;
use App\Http\livewire\Perangkat;
use App\Http\livewire\Kartuscan;
use App\Http\livewire\Fiturs;
use App\Http\livewire\Cuacas;
use App\Http\livewire\Grafikpengunjung;
use App\Http\livewire\Grafikcuaca;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\Landing::class, 'index'])->name('');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/destinasi/json', [App\Http\Controllers\Destinasis::class, 'maps']);
Route::get('/pengunjung/grafik', [App\Http\Controllers\Grafikpengunjung::class, 'index']);
Route::get('/cuaca/grafik', [App\Http\Controllers\Grafikcuaca::class, 'index']);

Route::get('/profile',Profile::class)->name('profile');
Route::get('/peserta',Peserta::class)->name('peserta');
Route::get('/voucher',Vouchers::class)->name('voucher');
Route::get('/destinasi',Destinasis::class)->name('destinasi');
Route::get('/destinasik',Destinasik::class)->name('destinasik');
Route::get('/topup',Topup::class)->name('topup');
Route::get('/detailtransaksi',Detailtransaksi::class)->name('detailtransaksi');
Route::get('/transaksi',Transaksis::class)->name('transaksi');
Route::get('/kategori',Kategoris::class)->name('kategori');
Route::get('/kategoriwisata',Kategorikotas::class)->name('kategoriwisata');
Route::get('/perangkat',Perangkat::class)->name('perangkat');
Route::get('/pengunjung',Pengunjung::class)->name('pengunjung');
Route::get('/kartu',Kartuscan::class)->name('kartu');
Route::get('/fitur',Fiturs::class)->name('fitur');
Route::get('/cuaca',Cuacas::class)->name('cuaca');
Route::get('/chat',Chat::class)->name('chat');

//Route::get('/cuaca/grafik',Grafikcuaca::class)->name('grafikcuaca');
// Route::get('/pengunjung/grafik',Grafikpengunjung::class)->name('grafikpengunjung');

Route::get('/',Landing::class)->name('');
Route::get('/',Lokasi::class)->name('');

Route::post('/profile/edit',[App\Http\Controllers\Profile::class, 'UbahUID']);
Route::post('/voucher/edit',[App\Http\Controllers\Topup::class, 'UbahSaldo']);


//routes baru
$router->get('transaksi','Transaksicontroller@index'); // for retrieving 
$router->post('transaksi','ProductController@insert');   //for creating 
$router->get('transaksi/{id}','ProductController@update'); //for updating 
