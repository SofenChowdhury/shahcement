<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\model\blog\BlogPost;
use App\model\blog\Post;
use App\model\blog\PollPost;
use App\model\forums\BlogForum;
use App\model\forums\JoinBlogForum;
use App\model\blog\Comment;use App\model\blog\PostReaction;
class NewsfeedController extends Controller{
    public function Index(){
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
            ->orderBy('id','DESC')
            ->get();
        $get_forum = BlogForum::where('status',1)->get();
        $post_forum = [];
    	return View('frontend.index',compact('blog_post','get_forum','post_forum'));
    }
    public function get_post_data($id){
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
            ->where('posts.id',$id)
            ->orderBy('id','DESC')
            ->first();
        $get_forum = BlogForum::where('status',1)->get();

        $images         = explode(',',$blog_post->image);
        $count_image    = count($images);
        $count_react    = PostReaction::where('post_id',$blog_post->id)->count();
        $count_comment  = Comment::where('post_id',$blog_post->id)->count();
        $get_comment    = Comment::leftjoin('users','users.id','comments.user_id')
            ->select('users.name','users.image','comments.*')
            ->where('comments.post_id',$blog_post->id)
            ->get();

        return View('frontend.post_single',compact('blog_post','get_forum','images','count_image','count_react','count_comment','get_comment'));
    }
}
