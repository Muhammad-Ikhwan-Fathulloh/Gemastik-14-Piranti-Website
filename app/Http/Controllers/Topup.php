<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voucher;
use Auth;

class Topup extends Controller
{
    public function __construct(){
		$this->User = new User();
		$this->Voucher = new Voucher();
	}

	public function UbahSaldo(Request $request){
		$Vouchers = $this->Voucher->detailData($request->uids);
    	$id = Auth::user()->id;
    	$data = [
    		'saldo' => Auth::user()->saldo + $Vouchers->nominal,
    	];

    	$this->User->editData($id, $data);
    	$this->Voucher->deleteData($Vouchers->id);

    	return redirect()->route('topup');
    }
}
