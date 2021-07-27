<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Profile extends Controller
{
	public function __construct(){
		$this->User = new User();
	}

    public function UbahUID(Request $request){
    	if (!empty($request->uids)) {
            $id = Auth::user()->id;
            $data = [
                'uid' => $request->uids,
            ];

            $this->User->editData($id, $data);
            alert()->success('Berhasil','Mendaftarkan UID Kartu!');
            return redirect()->route('profile');
        }else{
            alert()->error('Gagal','Masukkan UID Kartu!');
            return redirect()->route('profile');
        }
    }
}
