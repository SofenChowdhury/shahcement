<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\ConstractionRule;
class ConstructionController extends Controller
{
    public function Index(){
    	$get_const_rule = ConstractionRule::leftjoin('users','users.id','constraction_rules.author')
    		->select('users.name','users.image as user_image','constraction_rules.*')
    		->where('constraction_rules.status','1')
    		->get(); 
    	return View('frontend.construction.index',compact('get_const_rule'));
    }
    public function Law(){

    	return View('frontend.construction.law');
    }
    public function Order(){

    	return View('frontend.construction.order');
    }
    public function searchRule(Request $request){
      
        $get_const_rule    = ConstractionRule::leftjoin('users','users.id','constraction_rules.author')
            ->select('users.name','users.image as user_image','constraction_rules.*')
            ->where('constraction_rules.status',1)
            ->where('constraction_rules.title', 'like', '%' . $request->title . '%')
            ->get();

        return View('frontend.construction.index',compact('get_const_rule'));
    }
}
