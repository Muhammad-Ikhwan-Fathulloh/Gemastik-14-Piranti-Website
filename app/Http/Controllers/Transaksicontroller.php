<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Destinasi;
use App\Models\Laporandestinasi;
use App\Models\User;
use Auth;

class Transaksicontroller extends Controller
{
	public function __construct(){
		$this->Transaksi = new Transaksi();
        $this->Destinasi = new Destinasi();
        $this->Laporandestinasi = new Laporandestinasi();
        $this->User = new User();
	}

	public function index(Request $request){
    	$data = [
    		'transaksi' => $this->Transaksi->allData(),
    	];

    	return response()->json($data);
    }

    public function indexs($uid, Request $request){
    	$data = [
    		'transaksi' => $this->Transaksi->allDatas($uid),
    	];

    	return response()->json($data);
    }

    public function update($id, Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $transaksik = $this->Transaksi->detailData($id);
        $destinasik = $this->Destinasi->detailDatas($transaksik->id_destinasi);
        $id_destinasi = $transaksik->id_destinasi;
        $laporandestinasix = $this->Laporandestinasi->detailDatak($id_destinasi, date('d-m-Y'));

        //Laporan Kunjungan
        if (!empty($laporandestinasix)) {
            if ($laporandestinasix->tanggal == date('d-m-Y')) {
               $data_kunjungan = [
                    'jumlah_kunjungan' => $laporandestinasix->jumlah_kunjungan + 1,
                    'pendapatan' => $laporandestinasix->pendapatan + $destinasik->harga_destinasi,
               ];
               $data = [
                    'status' => $request->status,
                ];
                $datas = [
                    'jumlah_pengunjung' => $destinasik->jumlah_pengunjung + 1,
                ];

                $this->Destinasi->editDatas($transaksik->id_destinasi, $datas);

                $this->Transaksi->editData($id, $data);

                $this->Laporandestinasi->editDatak($id_destinasi, date('d-m-Y'), $data_kunjungan);
          
                return response()->json([
                    "message" => "Sukses ubah data".$id,
                ]);
               
           }elseif(empty($laporandestinasix->tanggal)){
                $data_kunjungan = [
                    'id_destinasi' => $id_destinasi,
                    'jumlah_kunjungan' => 1,
                    'pendapatan' => $destinasik->harga_destinasi,
                    'tanggal' => date('d-m-Y'),
               ];
               $data = [
                    'status' => $request->status,
                ];
                $datas = [
                    'jumlah_pengunjung' => $destinasik->jumlah_pengunjung + 1,
                ];

                $this->Destinasi->editDatas($transaksik->id_destinasi, $datas);

                $this->Transaksi->editData($id, $data);

                $this->Laporandestinasi->addDatak($data_kunjungan);
          
                return response()->json([
                    "message" => "Sukses ubah data".$id,
                ]);
               
           }
        }else{
            $data_kunjungan = [
                    'id_destinasi' => $id_destinasi,
                    'jumlah_kunjungan' => 1,
                    'pendapatan' => $destinasik->harga_destinasi,
                    'tanggal' => date('d-m-Y'),
               ];
               $data = [
                    'status' => $request->status,
                ];
                $datas = [
                    'jumlah_pengunjung' => $destinasik->jumlah_pengunjung + 1,
                ];

                $this->Destinasi->editDatas($transaksik->id_destinasi, $datas);

                $this->Transaksi->editData($id, $data);

                $this->Laporandestinasi->addDatak($data_kunjungan);
          
                return response()->json([
                    "message" => "Sukses ubah data".$id,
                ]);
               
        }

    }

    public function insert(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $userk = $this->User->detailDatas($request->uid);
        $id = $userk->id;
        $destinasix = $this->Destinasi->detailDatas($request->id_destinasi);
        $id_destinasi = $request->id_destinasi;
        $laporandestinasix = $this->Laporandestinasi->detailDatak($id_destinasi, date('d-m-Y'));
        if (empty($userk->id)) {
            return response()->json([
                "uid" => $request->uid,
                "message" => "Belum terdaftar"
            ]);
        }else if($userk->saldo < $destinasix->harga_destinasi){
            return response()->json([
                "uid" => $request->uid,
                "message" => "Saldo Kurang"
            ]);
        }else{
            

            //Laporan Kunjungan
            if (!empty($laporandestinasix)) {
                if ($laporandestinasix->tanggal == date('d-m-Y')) {
                   $data_kunjungan = [
                        'jumlah_kunjungan' => $laporandestinasix->jumlah_kunjungan + 1,
                        'pendapatan' => $laporandestinasix->pendapatan + $destinasix->harga_destinasi,
                   ];

                   $data = [
                        'id_user' => $userk->id,
                        'uid' => $request->uid,
                        'id_destinasi' => $request->id_destinasi,
                        'status' => $request->status,
                    ];

                    $datax = [
                        'saldo' => $userk->saldo - $destinasix->harga_destinasi,
                    ];

                    $this->User->editDatax($id, $datax);

                    $datas = [
                        'jumlah_pengunjung' => $destinasix->jumlah_pengunjung + 1,
                    ];

                    $this->Destinasi->editDatas($request->id_destinasi, $datas);

                   $this->Transaksi->addData($data); 

                    $this->Laporandestinasi->editDatak($id_destinasi, date('d-m-Y'), $data_kunjungan);

                    return response()->json([
                        "nama" => $userk->username.$id,
                        "message" => "Silahkan Masuk"
                    ]);
                                    
               }elseif(empty($laporandestinasix->tanggal)){
                    $data_kunjungan = [
                        'id_destinasi' => $id_destinasi,
                        'jumlah_kunjungan' => 1,
                        'pendapatan' => $destinasix->harga_destinasi,
                        'tanggal' => date('d-m-Y'),
                   ];

                   $data = [
                        'id_user' => $userk->id,
                        'uid' => $request->uid,
                        'id_destinasi' => $request->id_destinasi,
                        'status' => $request->status,
                    ];

                    $datax = [
                        'saldo' => $userk->saldo - $destinasix->harga_destinasi,
                    ];

                    $this->User->editDatax($id, $datax);

                    $datas = [
                        'jumlah_pengunjung' => $destinasix->jumlah_pengunjung + 1,
                    ];

                    $this->Destinasi->editDatas($request->id_destinasi, $datas);

                   $this->Transaksi->addData($data); 

                   $this->Laporandestinasi->addDatak($data_kunjungan);

                    return response()->json([
                        "nama" => $userk->username.$id,
                        "message" => "Silahkan Masuk"
                    ]);          
                   
               }
            }else{
                $data_kunjungan = [
                        'id_destinasi' => $id_destinasi,
                        'jumlah_kunjungan' => 1,
                        'pendapatan' => $destinasix->harga_destinasi,
                        'tanggal' => date('d-m-Y'),
                   ];

                   $data = [
                        'id_user' => $userk->id,
                        'uid' => $request->uid,
                        'id_destinasi' => $request->id_destinasi,
                        'status' => $request->status,
                    ];

                    $datax = [
                        'saldo' => $userk->saldo - $destinasix->harga_destinasi,
                    ];

                    $this->User->editDatax($id, $datax);

                    $datas = [
                        'jumlah_pengunjung' => $destinasix->jumlah_pengunjung + 1,
                    ];

                    $this->Destinasi->editDatas($request->id_destinasi, $datas);

                   $this->Transaksi->addData($data); 

                   $this->Laporandestinasi->addDatak($data_kunjungan);    

                    return response()->json([
                        "nama" => $userk->username.$id,
                        "message" => "Silahkan Masuk"
                    ]);
            }
        }  
    } 
}
