<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voucher;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Topup extends Controller
{
    public function __construct(){
		$this->User = new User();
		$this->Voucher = new Voucher();
	}

	public function UbahSaldo(Request $request){
		$Vouchers = $this->Voucher->detailData($request->uids);
        if (!empty($Vouchers->id_voucher)) {
            $id = Auth::user()->id;
            $data = [
                'saldo' => Auth::user()->saldo + $Vouchers->nominal,
            ];

            $this->User->editData($id, $data);
            $this->Voucher->deleteData($Vouchers->id);
            alert()->success('Berhasil','Menambahkan Saldo');
            return redirect()->route('topup');
        }else{
            alert()->error('Gagal','Masukkan Kode Voucher');
            return redirect()->route('topup');
        }
    	
    }
}
