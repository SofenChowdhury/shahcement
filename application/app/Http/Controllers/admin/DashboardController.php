<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index(){
    	$title = 'Dashboard';
    	return View('admin.dashboard',compact('title'));
    }
}
