<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use Alert;
use App\model\ConstractionRule;
class ConstructionController extends Controller
{
    public function Index(){
        $title = "Construction Rules";
        $get_rules = ConstractionRule::get();
        return View('admin.construction.index',compact('title','get_rules'));
    }
    public function saveConstructionRule(Request $request){
        return $request;
        
        return redirect()->back();
    }
    public function save(Request $request){
        $rules = array(
            'title'       	=> 'required',
            'file'       	=> 'required',
        );

        if($request->image){
            $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }
        
        $this->validate($request, $rules);

        $createConstruction = New ConstractionRule();

        $createConstruction->title 			= $request->title;
        $createConstruction->description 	= $request->description;
        $createConstruction->note 			= $request->note;
        $createConstruction->author 		= Auth::user()->id;
		$image   							= $request->file('image');
		$file   							= $request->file('file');

        if($image){
            $const_image 	= rand().$request->file('image')->getClientOriginalName();
            $destination 	= 'uploads/construction';
            $request->file('image')->move($destination, $const_image);

            $createConstruction->image     =$destination.'/'.$const_image;
        }
        if($file){
            $const_file 	= rand().$request->file('file')->getClientOriginalName();
            $destination 	= 'uploads/construction/files';
            $request->file('file')->move($destination, $const_file);

            $createConstruction->file     =$destination.'/'.$const_file;
        }

        $createConstruction->save();

        Alert::toast('Constraction Rule Created Successfully !', 'success');

        return redirect()->back();
    }
    public function update(Request $request){
    	$image   	= $request->file('image');
		$file   	= $request->file('file');

        if($image){
            $const_image 	= rand().$request->file('image')->getClientOriginalName();
            $destination 	= 'uploads/construction';
            $request->file('image')->move($destination, $const_image);

            $const_photo    = $destination.'/'.$const_image;
            $getImage 	= ConstractionRule::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getImage->image;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update_rule = ConstractionRule::where('id', $request->id)
	           ->update([
	               'image' 	=> $const_photo,
	            ]);
        }
        if($file){
            $const_file 	= rand().$request->file('file')->getClientOriginalName();
            $destination 	= 'uploads/construction/files';
            $request->file('file')->move($destination, $const_file);

            $construction_file     	= $destination.'/'.$const_file;
            $getUser 	= ConstractionRule::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getUser->file;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update_rule = ConstractionRule::where('id', $request->id)
	           ->update([
	               'file' 	=> $construction_file,
	            ]);
        }
        $update_rule = ConstractionRule::where('id', $request->id)
	           ->update([
	               'title' 			=> $request->title,
	               'description' 	=> $request->description,
	               'note' 			=> $request->note,
	            ]);
        Alert::toast('Construction Updated Successfully !', 'Success');
    	return redirect()->back();
    }
    public function Delete($id){

        $delete     	= ConstractionRule::where('id', $id)->delete();
    	return 'Delete Rule';
    }
    // Ajax

    public function actionConstructionRule($id,$id2){

        $update     = ConstractionRule::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }
}
