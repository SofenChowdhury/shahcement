<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;use DB;
use App\model\blog\BlogPost;use App\model\blog\Post;use App\model\blog\PollPost;
class BlogController extends Controller
{
    public function Index(){
    	$title = 'Blog List';
    	$blog_post = Post::leftjoin('blog_posts','blog_posts.post_id','posts.id')
            ->leftjoin('poll_posts','poll_posts.post_id','posts.id')
            ->leftjoin('users','users.id','posts.author')
            ->select('blog_posts.title as post_title','blog_posts.sub_title as post_sub_title','blog_posts.image','blog_posts.description','posts.*','poll_posts.title as poll_title','users.name')
            ->distinct('posts.id')
            ->orderBy('id','DESC')
            ->get();
    	return view('admin.blog',compact('title','blog_post'));
    }
    public function Delete($id){

        $delete     = Post::where('id', $id)->delete();
    	return 'Delete Blog';
    }
    public function savePost(Request $request){


        $images     = array();
        if($files=$request->file('image')){

            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $destination    = 'uploads/post';
                $file->move($destination,$name);
                $images[]=$destination.'/'.$name;
            }
        }
        
        $post = New Post();

        $post->post_type_id  = $request->post_type;
        $post->forum_id      = $request->forum_id;
        $post->author        = Auth::user()->id;
        $post->status        = '0';

        $post->save();

        $last_inserted_id = $post->id;

        if($request->post_type == '1'){

            $blog_post = New BlogPost();

            $blog_post->post_id      = $last_inserted_id;
            $blog_post->title        = $request->title;
            $blog_post->sub_title    = $request->sub_title;
            $blog_post->description  = $request->description;
            $blog_post->image        = implode(",",$images);

            $blog_post->save();

        }elseif ($request->post_type == '2') {

            $poll_post = New PollPost();

            $poll_post->post_id     = $last_inserted_id;
            $poll_post->title       = $request->title;
            $poll_post->note        = $request->sub_title;

            $poll_post->save();

            $last_inserted_poll_id = $poll_post->id;

            for ($i= 0; $i< count($request->qustion); $i++){

                $question_option = DB::table('poll_options')->insert( [
                            'poll_post_id'  =>  $last_inserted_poll_id,
                            'qustion'       =>  $request['qustion'][$i],
                        ]);
            }
        }
        
    	return redirect()->back();
    }

    // Ajax

    public function approvePost($id,$id2){
        
        $update     = Post::where('id', $id)
            ->update([
               'accepted_by'=> Auth::user()->id,
               'status'     => $id2,
            ]);
        return "Success";
    }
    public function upload(Request $request){

        $upload             = $request->file('upload');

        if($upload){
            $const_image    = rand().$request->file('upload')->getClientOriginalName();
            $destination    = 'uploads/media';
            $request->file('upload')->move($destination, $const_image);

            // $createConstruction->upload    = $destination.'/'.$const_image;

            // $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            // $msg             = 'Image Uploaded';
            // $response        = "<script>window.parent.CKEDITOR.tools.callFuntion($CKEditorFuncNum, '$destination', '$msg')</script>";
            // @header('Content-type:text/html; charset=utf-8');
            // echo $response;

            return;
        }
    }
    public function browsImage(Request $request){

        $images = \File::allFiles('uploads/media');
        return View('frontend.media.index',compact('images'));
    }
}
