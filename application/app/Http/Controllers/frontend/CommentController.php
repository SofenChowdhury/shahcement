<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\model\blog\Comment;use App\model\blog\PostReaction;

class CommentController extends Controller
{
    public function post_comment(Request $request){

    	$post_comment = New Comment();

        $post_comment->user_id 		= Auth::user()->id;
        $post_comment->post_id 		= $request->post_id;
        $post_comment->comment 		= $request->post_comment;

        $post_comment->save();
        return;
    }

    public function react_post(Request $request){

    	$check_post = PostReaction::where('user_id',Auth::user()->id)
    		->where('post_id',$request->post_id)->first();
    	if($check_post){
    		$update_react = PostReaction::where('id', $check_post->id)
	           ->update([
	               'react_id' 	=> $request->react_id,
	            ]);
    	}else{

	    	$post_react = New PostReaction();

	        $post_react->user_id 	= Auth::user()->id;
	        $post_react->post_id 	= $request->post_id;
	        $post_react->react_id 	= $request->react_id;

	        $post_react->save();
    	}
        return;
    }
}
