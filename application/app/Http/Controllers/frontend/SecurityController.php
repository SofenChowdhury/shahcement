<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
class SecurityController extends Controller
{
    public function Password(){
    	$title = "Change Password";

    	return View('frontend.security.password');
    }
    public function updatePassword(Request $request){

    	$hashedPassword = Auth::user()->password;
 
       	if (\Hash::check($request->old_password , $hashedPassword )) {
       		if ($request->new_password == $request->re_password){
	       		$update_user = User::where('id', Auth::user()->id)
		           ->update([
		               'password' 	=> bcrypt($request->new_password),
		            ]);
		        Auth::logout();
		        return 'success';
       		}else{
       			return 're_error';
       		}
       	}
       	else{
       		return 'error';
       	}

    	return $request;
    }
}
