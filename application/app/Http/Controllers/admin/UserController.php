<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use Alert;
class UserController extends Controller
{
    public function Index(){
    	$title 		= "User";
    	$get_user 	= User::get();

    	return View('admin.users',compact('get_user','title'));
    }
    public function saveUser(Request $request){

    	$rules = array(
            'name'       	=> 'required',
            'email'   		=> 'required|unique:users',
            'phone'      	=> 'required|unique:users',
            'password'      => 'required|required_with:re_password|same:re_password',
        );
        if($request->image){
            $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }

        $this->validate($request, $rules);

        $create_user = New User();

        $create_user->name 		= $request->name;
        $create_user->email 	= $request->email;
        $create_user->phone 	= $request->phone;
        $create_user->password 	= bcrypt($request->password);
		$image   				= $request->file('image');

        if($image){
            $user_image = rand().$request->file('image')->getClientOriginalName();
            $destination = 'uploads/user';
            $request->file('image')->move($destination, $user_image);

            $create_user->image     =$destination.'/'.$user_image;
        }

        $create_user->save();

        Alert::toast('User Created Successfully !', 'Success');

    	return redirect()->back();
    }
    public function updateUser(Request $request){

    	$image  = $request->file('image');

        if($image){
            $user_image = rand().$request->file('image')->getClientOriginalName();
            $destination = 'uploads/user';
            $request->file('image')->move($destination, $user_image);

            $photo     =$destination.'/'.$user_image;
            $getUser = User::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getUser->image;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update_user = User::where('id', $request->id)
	           ->update([
	               'name' 	=> $request->name,
	               'email' 	=> $request->email,
	               'phone' 	=> $request->phone,
	               'image' 	=> $photo,
	            ]);
        }else{
        	$update_user = User::where('id', $request->id)
	           ->update([
	               'name' 	=> $request->name,
	               'email' 	=> $request->email,
	               'phone' 	=> $request->phone,
	            ]);
        }
        Alert::toast('User Created Successfully !', 'Success');
    	return redirect()->back();
    }

    public function Delete($id){
    	$delete_user = User::where('id', $id)->delete();

    	return redirect()->back();
    }
}
