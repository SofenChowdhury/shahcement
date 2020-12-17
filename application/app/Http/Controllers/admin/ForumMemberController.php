<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\model\forums\BlogForum;use App\model\forums\JoinBlogForum;
class ForumMemberController extends Controller
{
    public function Index(){
    	$title = 'Forum Members';
    	$forum_members = JoinBlogForum::leftjoin('blog_forums','blog_forums.id','join_blog_forums.forum_id')
    	->leftjoin('users','users.id','join_blog_forums.user_id')
    	->select('blog_forums.title','users.name','join_blog_forums.*')
    	->orderBy('id','DESC')->get();

    	return view('admin.forum_members',compact('title','forum_members'));
    }
    public function actionForumMember($id,$id2){
    	$update     = JoinBlogForum::where('id', $id)
            ->update([
               'status'     => $id2,
            ]);
        return "Success";
    }
}
