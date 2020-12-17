<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\model\Video;
class VideoController extends Controller
{
    public function Index(){
        $title = "Video";
        $get_gallery = Video::get();
        return View('admin.videos.index',compact('title','get_gallery'));
    }
    public function Save(Request $request){
        $rules = array(
            'title'       	=> 'required',
        );

        if($request->image){
            $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }

        $this->validate($request, $rules);

        $saveVideo = New Video();

        $saveVideo->title 		= $request->title;
        $saveVideo->video_link 	= $request->video_link;
		$video_image   			= $request->file('video_image');

        if($video_image){
            $photo 	= rand().$request->file('video_image')->getClientOriginalName();
            $destination 	= 'uploads/videos';
            $request->file('video_image')->move($destination, $photo);

            $saveVideo->video_image 	= $destination.'/'.$photo;
        }

        $saveVideo->save();

        Alert::toast('Video Created Successfully !', 'success');

        return redirect()->back();
   	}
   	public function Update(Request $request){
    	$video_image           = $request->file('video_image');

        if($video_image){
            $dirImage 	= rand().$request->file('video_image')->getClientOriginalName();
            $destination 	= 'uploads/videos';
            $request->file('video_image')->move($destination, $dirImage);

            $photo    = $destination.'/'.$dirImage;
            $getUser 	= Video::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getUser->video_image;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update = Video::where('id', $request->id)
	            ->update([
	               'video_image' 	=> $photo,
	            ]);
        }
        
        $update = Video::where('id', $request->id)
	            ->update([
	               'title'     	=> $request->title,
	               'video_link' => $request->video_link,
	            ]);
        Alert::toast('Video Updated Successfully !', 'Success');
    	return redirect()->back();
    }
   	public function Delete($id){

        $delete     	= Video::where('id', $id)->delete();
    	return 'Delete Forum';
   	}
   	public function actionVideo($id,$id2){

        $update     = Video::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }
}
