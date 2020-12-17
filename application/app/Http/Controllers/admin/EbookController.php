<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use Alert;
use App\model\ELibrary;
class EbookController extends Controller
{
    public function Index(){
        $title = "E-Library lists";
        $get_library = ELibrary::get();
        return View('admin.library.index',compact('title','get_library'));
    }
    public function saveLbrary(Request $request){
        $rules = array(
            'title'       	=> 'required',
            'file'       	=> 'required',
        );

        if($request->icon){
            $this->validate($request, ['icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }

        $this->validate($request, $rules);

        $library = New ELibrary();

        $library->title 		= $request->title;
        $library->description 	= $request->description;
		$icon   				= $request->file('icon');
		$file   				= $request->file('file');

        if($icon){
            $library_icon 	= rand().$request->file('icon')->getClientOriginalName();
            $destination 	= 'uploads/library/icon';
            $request->file('icon')->move($destination, $library_icon);

            $library->icon  = $destination.'/'.$library_icon;
        }
        if($file){
            $library_file 	= rand().$request->file('file')->getClientOriginalName();
            $destination 	= 'uploads/library';
            $request->file('file')->move($destination, $library_file);

            $library->file     =$destination.'/'.$library_file;
        }

        $library->save();

        Alert::toast('E-Library Created Successfully !', 'Success');

    	return redirect()->back();
    }
    public function updateLibrary(Request $request){
        $icon    = $request->file('icon');
        $file    = $request->file('file');

        if($icon){
            $library_icon   = rand().$request->file('icon')->getClientOriginalName();
            $destination    = 'uploads/library/icon';
            $request->file('icon')->move($destination, $library_icon);

            $icon_file      = $destination.'/'.$library_icon;
            $getIcon        = ELibrary::where('id',$request->id)->first();
            // delete the root image
            $image_path     = $getIcon->icon;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $update_user = ELibrary::where('id', $request->id)
               ->update([
                   'icon'  => $icon_file,
                ]);
        }
        if($file){
            $library_file   = rand().$request->file('file')->getClientOriginalName();
            $destination    = 'uploads/library';
            $request->file('file')->move($destination, $library_file);

            $library_doc   = $destination.'/'.$library_file;
            $getFile    = ELibrary::where('id',$request->id)->first();
            // delete the root image
            $image_path = $getFile->file;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $update_user = ELibrary::where('id', $request->id)
               ->update([
                   'file'     => $library_doc,
                ]);
        }
        $update_user = ELibrary::where('id', $request->id)
               ->update([
                   'title'          => $request->title,
                   'description'    => $request->description,
                ]);
        Alert::toast('Forum Updated Successfully !', 'Success');
        return redirect()->back();
    }

    public function Delete($id){
        $delete = ELibrary::where('id',$id)->delete();
    }
    // Ajax

    public function actionLibrary($id,$id2){

        $update     = ELibrary::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }
}
