<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Profile extends Controller
{
	public function __construct(){
		$this->User = new User();
	}

    public function UbahUID(Request $request){
    	$id = Auth::user()->id;
    	$data = [
    		'uid' => $request->uids,
    	];

    	$this->User->editData($id, $data);

    	return redirect()->route('profile');
    }
}
