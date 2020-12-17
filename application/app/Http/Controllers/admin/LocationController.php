<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;use DB;use Alert;
use App\model\location\Division;use App\model\location\City;use App\model\location\Service;
class LocationController extends Controller
{
    public function Index(){
    	$title = "Location Setup" ;
    	$get_divission 	= Division::get();
    	$get_city 		= City::get();
    	return View('admin.location.index',compact('title','get_divission','get_city'));
    }
    public function SaveDivision(Request $request){
        $rules = array(
            'division_name' => 'required',
        );
        $this->validate($request, $rules);

        $save = New Division();

        $save->division_name = $request->division_name;
        $save->note 	= $request->note;

        $save->save();

        Alert::toast('Division Created Successfully !', 'success');

        return redirect()->back();
   	}
   	public function DeleteDivision($id){

        $deleteDirectory   	= Division::where('id', $id)->delete();
        $deleteCity     	= City::where('division_id', $id)->delete();
        $deleteService     	= Service::where('division_id', $id)->delete();
    	return 'Delete Division';
   	}
/******************** City *************************/
   	public function SaveCity(Request $request){
        $rules = array(
            'division_id'   => 'required',
            'city_name'     => 'required',
        );
        $this->validate($request, $rules);

        $save = New City();

        $save->division_id 	= $request->division_id;
        $save->city_name 	= $request->city_name;
        $save->note 		= $request->note;

        $save->save();

        Alert::toast('City Created Successfully !', 'success');

        return redirect()->back();
   	}
   	public function DeleteCity($id){

        $deleteCity     	= City::where('id', $id)->delete();
        $deleteService     	= Service::where('city_id', $id)->delete();
    	return 'Delete Forum';
   	}
   	/******************** City *************************/
   	public function SaveService(Request $request){
        $rules = array(
            'city_id'     	=> 'required',
            'division_id'   => 'required',
            'service_name'  => 'required',
        );
        $this->validate($request, $rules);

        $save = New Service();

        $save->division_id 	= $request->division_id;
        $save->city_id 		= $request->city_id;
        $save->service_name = $request->service_name;
        $save->note 		= $request->note;

        $save->save();

        Alert::toast('Service Created Successfully !', 'success');

        return redirect()->back();
   	}
   	public function DeleteService($id){

        $deleteService     	= Service::where('id', $id)->delete();
    	return 'Delete Forum';
   	}

   	public function GetCity($id){
   		return $getCity   = City::where('division_id', $id)->get();
   	}
    public function GetService($id){
      return $getService   = Service::where('city_id', $id)->get();
    }
}
