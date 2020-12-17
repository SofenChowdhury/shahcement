<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Directory;use App\model\location\Division;
class DirectoryController extends Controller
{
    public function Index(){
    	
    	$get_directory 		= Directory::where('status',1)->get();
    	$directory_count 	= Directory::where('status',1)->count();
        $get_divission      = Division::get();
    	return View('frontend.directory.index',compact('get_directory','directory_count','get_divission'));
    }
    public function GetDirector(Request $request){
    	
    	return $get_directory 		= Directory::leftjoin('divisions','divisions.id','directories.devision_id')
            ->leftjoin('cities','cities.id','directories.city_id')
            ->leftjoin('services','services.id','directories.service_id')
            ->where('directories.status',1)
    		->where('directories.service_id', $request->service_id)
            ->select('divisions.division_name','cities.city_name','services.service_name','directories.*')
    		->get();
    }

}
