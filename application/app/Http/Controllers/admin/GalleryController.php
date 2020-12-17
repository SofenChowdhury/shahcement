<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\model\Gallery;
class GalleryController extends Controller
{
    public function Index(){
        $title = "Gallery";
        $get_gallery = Gallery::get();
        return View('admin.gallery.index',compact('title','get_gallery'));
    }
    public function Save(Request $request){
        $rules = array(
            'title'       	=> 'required',
            'image'       	=> 'required',
        );

        if($request->image){
            $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }

        $this->validate($request, $rules);

        $saveGallery = New Gallery();

        $saveGallery->title = $request->title;
        $saveGallery->note 	= $request->note;
		$image   			= $request->file('image');

        if($image){
            $photo 	= rand().$request->file('image')->getClientOriginalName();
            $destination 	= 'uploads/gallery';
            $request->file('image')->move($destination, $photo);

            $saveGallery->image 	= $destination.'/'.$photo;
        }

        $saveGallery->save();

        Alert::toast('Gallery Created Successfully !', 'success');

        return redirect()->back();
   	}
   	public function Delete($id){

        $deleteDirectory     	= Gallery::where('id', $id)->delete();
    	return 'Delete Forum';
   	}
   	public function actionGallery($id,$id2){

        $update     = Gallery::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }
}	
