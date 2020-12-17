<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Gallery;use App\model\Video;
class GalleryController extends Controller
{
   	public function Index(){
   		$get_gallery = Gallery::where('status',1)->get();
   		return View('frontend.gallery.index',compact('get_gallery'));
   	}
   	public function Videos(){
   		$get_videos = Video::where('status',1)->get();
   		return View('frontend.gallery.videos',compact('get_videos'));
   	}
   	
}
