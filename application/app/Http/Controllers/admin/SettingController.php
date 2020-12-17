<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Alert;
use Auth;
use App\model\SetupSite;
class SettingController extends Controller
{
    public function Index(){
    	$title = "Setup Site Settings";
    	$get_setup = SetupSite::first();
    	return View('admin.settings.index',compact('title','get_setup'));
    }
    public function updateSettingForums(Request $request){

    	$check_data = SetupSite::first();

    	if ($check_data) {

    		$bg_image   		= $request->file('bg_image');
			$logo   			= $request->file('logo');
			$pg_loder   		= $request->file('pg_loder');
	        $destination 		= 'uploads/setup';
	        $getSetting 		= SetupSite::where('id',$request->id)->first();

			if($bg_image){

	    		$bg_image 		= rand().$request->file('bg_image')->getClientOriginalName();
	            $request->file('bg_image')->move($destination, $bg_image);
	            $background     = $destination.'/'.$bg_image;
	            // delete the root image
		    	$image_path 	= $getSetting->bg_image;
				if(File::exists($image_path)) {
				    File::delete($image_path);
				}
			}else{
				$background = $getSetting->bg_image;
			}
			if($logo){

	    		$logo 		= rand().$request->file('logo')->getClientOriginalName();
	            $request->file('logo')->move($destination, $logo);
	            $logo_image = $destination.'/'.$logo;
	            // delete the root image
		    	$image_path = $getSetting->logo;
				if(File::exists($image_path)) {
				    File::delete($image_path);
				}
			}else{
				$logo_image = $getSetting->logo;
			}
			if($pg_loder){

	    		$pg_loder 	= rand().$request->file('pg_loder')->getClientOriginalName();
	            $request->file('pg_loder')->move($destination, $pg_loder);
	            $loder     	= $destination.'/'.$pg_loder;
	            // delete the root image
		    	$image_path = $getSetting->pg_loder;
				if(File::exists($image_path)) {
				    File::delete($image_path);
				}
			}else{
				$loder = $getSetting->pg_loder;
			}
			$updateSiteData = SetupSite::where('id', $request->id)
	           ->update([
	               'site_name' 	=> $request->site_name,
	               'address' 	=> $request->address,
	               'pg_loder' 	=> $loder,
	               'bg_image' 	=> $background,
	               'logo' 		=> $logo_image,
	               'email' 		=> implode(",",$request->email),
	               'phone' 		=> implode(",",$request->phone),
	            ]);
	        Alert::toast('Settings Updated Successfully !', 'Success');
    	}else{

	        $setupSiteData = New SetupSite();

			$bg_image   		= $request->file('bg_image');
			$logo   			= $request->file('logo');
			$pg_loder   		= $request->file('pg_loder');

	        if($bg_image){
	            $bg_image = rand().$request->file('bg_image')->getClientOriginalName();
	            $destination = 'uploads/setup';
	            $request->file('bg_image')->move($destination, $bg_image);

	            $setupSiteData->bg_image     =$destination.'/'.$bg_image;
	        }
	        if($logo){
	            $user_image = rand().$request->file('logo')->getClientOriginalName();
	            $destination = 'uploads/setup';
	            $request->file('logo')->move($destination, $user_image);

	            $setupSiteData->logo     =$destination.'/'.$user_image;
	        }
	        if($pg_loder){
	            $user_image = rand().$request->file('pg_loder')->getClientOriginalName();
	            $destination = 'uploads/setup';
	            $request->file('pg_loder')->move($destination, $user_image);

	            $setupSiteData->pg_loder     =$destination.'/'.$user_image;
	        }
	        $setupSiteData->site_name 	= $request->site_name;
	        $setupSiteData->address 	= $request->address;
	        $setupSiteData->email 		= implode(",",$request->email);
	        $setupSiteData->phone 		= implode(",",$request->phone);

	        $setupSiteData->save();

	        Alert::toast('Settings Created Successfully !', 'Success');
    	}

    	return redirect()->back();
    }
}
