<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\ELibrary;
class EBookController extends Controller
{
    public function Index(){
    	$get_library = ELibrary::where('status',1)->get();
    	return View('frontend.e_book.index',compact('get_library'));
    }
    public function searchEbook(Request $request){
    	
    	$get_library 		= ELibrary::where('status',1)
    		->where('title', 'like', '%' . $request->title . '%')
    		->get();

    	return View('frontend.e_book.index',compact('get_library'));
    }
}
