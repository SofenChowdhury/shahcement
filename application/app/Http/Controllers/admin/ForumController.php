<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Alert;
use App\model\forums\BlogForum;use App\model\forums\JoinBlogForum;
class ForumController extends Controller
{
    public function Index(){
    	$title = 'Blog List';
    	$blog_forum = BlogForum::orderBy('id','DESC')->get();
    	return view('admin.forum',compact('title','blog_forum'));
    }
    public function Delete($id){

        $deleteForum     	= BlogForum::where('id', $id)->delete();
        $deleteForumUser    = JoinBlogForum::where('forum_id', $id)->delete();
    	return 'Delete Forum';
    }
    public function saveForums(Request $request){

        $rules = array(
            'title'       	=> 'required',
        );
        if($request->cover){
            $this->validate($request, ['cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }
        if($request->avatar){
            $this->validate($request, ['avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        }

        $this->validate($request, $rules);

        $create_forum = New BlogForum();

        $create_forum->title= $request->title;
        $create_forum->note = $request->note;
		$cover   			= $request->file('cover');
		$avatar   			= $request->file('avatar');

        if($cover){
            $forum_cover 	= rand().$request->file('cover')->getClientOriginalName();
            $destination 	= 'uploads/forum';
            $request->file('cover')->move($destination, $forum_cover);

            $create_forum->cover     =$destination.'/'.$forum_cover;
        }
        if($avatar){
            $forum_avatar 	= rand().$request->file('avatar')->getClientOriginalName();
            $destination 	= 'uploads/forum';
            $request->file('avatar')->move($destination, $forum_avatar);

            $create_forum->avatar     =$destination.'/'.$forum_avatar;
        }

        $create_forum->save();

        Alert::toast('Forum Created Successfully !', 'Success');

    	return redirect()->back();
    }
    public function updateForums(Request $request){
    	$cover   	= $request->file('cover');
		$avatar   	= $request->file('avatar');

        if($cover){
            $forum_cover 	= rand().$request->file('cover')->getClientOriginalName();
            $destination 	= 'uploads/forum';
            $request->file('cover')->move($destination, $forum_cover);

            $cover_photo     	= $destination.'/'.$forum_cover;
            $getUser 	= BlogForum::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getUser->cover;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update_user = BlogForum::where('id', $request->id)
	           ->update([
	               'cover' 	=> $cover_photo,
	            ]);
        }
        if($avatar){
            $forum_avatar 	= rand().$request->file('avatar')->getClientOriginalName();
            $destination 	= 'uploads/forum';
            $request->file('avatar')->move($destination, $forum_avatar);

            $avatar_photo     	= $destination.'/'.$forum_avatar;
            $getUser 	= BlogForum::where('id',$request->id)->first();
            // delete the root image
	    	$image_path = $getUser->avatar;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}

	    	$update_user = BlogForum::where('id', $request->id)
	           ->update([
	               'avatar' 	=> $avatar_photo,
	            ]);
        }
        $update_user = BlogForum::where('id', $request->id)
	           ->update([
	               'title' 	=> $request->title,
	               'type' 	=> $request->type,
	               'note' 	=> $request->note,
	            ]);
        Alert::toast('Forum Updated Successfully !', 'Success');
    	return redirect()->back();
    }
    // Ajax

    public function actionForums($id,$id2){

        $update     = BlogForum::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }

}
