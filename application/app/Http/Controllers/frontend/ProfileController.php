<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\model\blog\BlogPost;use App\model\blog\Post;use App\model\blog\PollPost;
use App\model\forums\BlogForum;use App\model\forums\JoinBlogForum;use App\model\UserInfo;

class ProfileController extends Controller
{
    public function Profile(){
        $blog_post = Post::leftjoin('blog_posts','blog_posts.post_id','posts.id')
            ->leftjoin('poll_posts','poll_posts.post_id','posts.id')
            ->leftjoin('users','users.id','posts.author')
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
            ->where('posts.author',Auth::user()->id)
            ->orderBy('id','DESC')
            ->get();
        $get_forum = BlogForum::where('status',1)->get();  
        $user_info = UserInfo::where('user_id',Auth::user()->id)->first();
        $my_forums = JoinBlogForum::leftjoin('blog_forums','blog_forums.id','join_blog_forums.forum_id')
            ->select('blog_forums.title','blog_forums.avatar','join_blog_forums.*')
            ->where('join_blog_forums.user_id',Auth::user()->id)
            ->where('join_blog_forums.status','1')
            ->get(); 
        $post_forum = []; 
        $count_post     = Post::where('status','1')->where('author',Auth::user()->id)->count();
        $count_forums   = JoinBlogForum::where('status','1')->where('user_id',Auth::user()->id)->count();
        
    	return View('frontend.profile_layout',compact('blog_post','get_forum','post_forum','user_info','my_forums','count_post','count_forums'));
    }
    public function Timeline(){
        $blog_post = Post::leftjoin('blog_posts','blog_posts.post_id','posts.id')
            ->leftjoin('poll_posts','poll_posts.post_id','posts.id')
            ->leftjoin('users','users.id','posts.author')
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
            ->where('posts.author',Auth::user()->id)
            ->orderBy('id','DESC')
            ->get();
        $get_forum = BlogForum::where('status',1)->get();
        $user_info = UserInfo::where('user_id',Auth::user()->id)->first();
        $my_forums = JoinBlogForum::leftjoin('blog_forums','blog_forums.id','join_blog_forums.forum_id')
            ->select('blog_forums.title','blog_forums.avatar','join_blog_forums.*')
            ->where('join_blog_forums.user_id',Auth::user()->id)
            ->where('join_blog_forums.status','1')
            ->get(); 
        $post_forum = []; 
    	return View('frontend.profile.timeline',compact('blog_post','get_forum','post_forum','user_info','my_forums'));
    }
    public function About(){
        $user_info = UserInfo::where('user_id',Auth::user()->id)->first();
        $my_forums = JoinBlogForum::leftjoin('blog_forums','blog_forums.id','join_blog_forums.forum_id')
            ->select('blog_forums.title','blog_forums.avatar','join_blog_forums.*')
            ->where('join_blog_forums.user_id',Auth::user()->id)
            ->where('join_blog_forums.status','1')
            ->get(); 
    	return View('frontend.profile.about',compact('user_info','my_forums'));
    }
    public function Photos(){

    	return View('frontend.profile.photos');
    }
    public function Videos(){

    	return View('frontend.profile.videos');
    }
    public function Groups(){
        $get_forums = BlogForum::get();
    	return View('frontend.profile.my_groups',compact('get_forums'));
    }
    public function Edit(){
        $user_info = UserInfo::where('user_id',Auth::user()->id)->first();
        $my_forums = JoinBlogForum::leftjoin('blog_forums','blog_forums.id','join_blog_forums.forum_id')
            ->select('blog_forums.title','blog_forums.avatar','join_blog_forums.*')
            ->where('join_blog_forums.user_id',Auth::user()->id)
            ->where('join_blog_forums.status','1')
            ->get();

        if ($user_info) {
            return View('frontend.profile.update',compact('user_info','my_forums'));
        }else{
            return View('frontend.profile.edit',compact('my_forums'));
        }
    }
    public function submitUserInfo(Request $request){

        $check = UserInfo::where('user_id',Auth::user()->id)->first();
        if ($check) {
            $update_user_info = UserInfo::where('user_id', Auth::user()->id)
               ->update([
                   'about_me'       => $request->about_me,
                   'birth_date'     => $request->birthday,
                   'city'           => $request->city,
                   'country'        => $request->country,
                   'occupation'     => $request->occupation,
                   'website'        => $request->website,
                ]);
        }else{
            $create_user_info = New UserInfo();

            $create_user_info->user_id   = Auth::user()->id;
            $create_user_info->about_me  = $request->about_me;
            $create_user_info->birth_date= $request->birthday;
            $create_user_info->city      = $request->city;
            $create_user_info->country   = $request->country;
            $create_user_info->occupation= $request->occupation;
            $create_user_info->website   = $request->website;

            $create_user_info->save();
        }

        return redirect()->back();
    }
}
