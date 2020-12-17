<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\model\blog\BlogPost;
use App\model\blog\Post;
use App\model\blog\PollPost;
use App\model\blog\Comment;use App\model\blog\PostReaction;
use App\model\forums\BlogForum;use App\model\forums\JoinBlogForum;
class ForumController extends Controller
{
	public function Index(){
		 $get_forums = BlogForum::get();
		return View('frontend.forum.index',compact('get_forums'));
	}
	public function joinGroup($id,$id2){

		$check = JoinBlogForum::where('forum_id',$id)
			->where('user_id',Auth::user()->id)
			->first();

		if ($check) {
			$update     = JoinBlogForum::where('forum_id', $id)
            ->update([
              'status'     => $id2,
            ]);
		}else{

      		$create_user = New JoinBlogForum();
            $create_user->forum_id 	= $id;
            $create_user->user_id 	= Auth::user()->id;
    
            $create_user->save();
		}

        return "Success";
	}

    public function BlogForum($id){

          $blog_post = Post::leftjoin('blog_posts','blog_posts.post_id','posts.id')
            ->leftjoin('poll_posts','poll_posts.post_id','posts.id')
            ->leftjoin('users','users.id','posts.author')
            ->leftjoin('join_blog_forums','join_blog_forums.forum_id','posts.forum_id')
            ->select('blog_posts.title as post_title',
                 'blog_posts.sub_title as post_sub_title',
                 'blog_posts.image','blog_posts.description',
                 'posts.*',
                 'poll_posts.title as poll_title',
                 'poll_posts.id as poll_id',
                 'poll_posts.note as poll_sub_title',
                 'users.name',
                 'users.image as user_image')
            ->distinct('posts.id')
            ->where('posts.status','1')
            ->where('join_blog_forums.user_id',Auth::user()->id)
            ->where('join_blog_forums.status',1)
            ->where('posts.forum_id',$id)
            ->orderBy('id','DESC')
            ->paginate(10);
    
        $get_forum  = BlogForum::where('status',1)->get();
        $post_forum = BlogForum::where('status',1)->where('id',$id)->first();
     
        return View('frontend.blog_post',compact('blog_post','get_forum','post_forum'));
    }

    public function searchForum(Request $request){
      
        $get_forums    = BlogForum::where('status',1)
          ->where('title', 'like', '%' . $request->title . '%')
          ->get();
    
        return View('frontend.forum.index',compact('get_forums'));
    }
    public function searchPost(Request $request){
      
         $blog_post = Post::leftjoin('blog_posts','blog_posts.post_id','posts.id')
            ->leftjoin('poll_posts','poll_posts.post_id','posts.id')
            ->leftjoin('users','users.id','posts.author')
            ->leftjoin('join_blog_forums','join_blog_forums.forum_id','posts.forum_id')
            ->select('blog_posts.title as post_title',
                 'blog_posts.sub_title as post_sub_title',
                 'blog_posts.image','blog_posts.description',
                 'posts.*',
                 'poll_posts.title as poll_title',
                 'poll_posts.id as poll_id',
                 'poll_posts.note as poll_sub_title',
                 'users.name',
                 'users.image as user_image')
            ->distinct('posts.id')
            ->where('posts.status','1')
            ->where('join_blog_forums.user_id',Auth::user()->id)
            ->where('join_blog_forums.status',1)
            ->where('posts.forum_id',$request->id)
            ->where('blog_posts.title', 'like', '%' . $request->title . '%')
            ->orderBy('id','DESC')
            ->get();

        $get_forum  = BlogForum::where('status',1)->get();
        $post_forum = BlogForum::where('status',1)->where('id',$request->id)->first();
     
        return View('frontend.blog_post',compact('blog_post','get_forum','post_forum'));
    }
}

