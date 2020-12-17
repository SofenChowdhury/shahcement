<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Auth;
use App\model\Message;use App\model\RepliedMessage;
use App\model\blog\Post;
use App\model\forums\JoinBlogForum;
use App\model\UserInfo;
class InformationController extends Controller
{
    public function InfoAdvice(){

    	return View('frontend.information.info_advice');
    }
    public function submitMessage(Request $request){
    	$rules = array(
            'title'       	=> 'required',
            'message'       => 'required',
        );

        $this->validate($request, $rules);

        $savemessage = New Message();

        $savemessage->title 	= $request->title;
        $savemessage->sub_title = $request->subject;
        $savemessage->phone 	= $request->phone;
        $savemessage->sender 	= Auth::user()->id;
        $savemessage->message 	= $request->message;
		
        $savemessage->save();

        Alert::toast('Message Sent Successfully !', 'success');

        return redirect()->back();
    }
    public function ViewMessage($id){

        $user_info = UserInfo::where('user_id',Auth::user()->id)->first();
        $count_post     = Post::where('status','1')->where('author',Auth::user()->id)->count();
        $count_forums   = JoinBlogForum::where('status','1')->where('user_id',Auth::user()->id)->count();
        $get_message    = Message::where('id',$id)->first();
        $get_replied    = RepliedMessage::where('message_id',$id)->get();
        return View('frontend.information.view_message',compact('user_info','count_post','count_forums','get_message','get_replied'));
    }
    public function AllMessage(){

        $user_info = UserInfo::where('user_id',Auth::user()->id)->first();
        $count_post     = Post::where('status','1')->where('author',Auth::user()->id)->count();
        $count_forums   = JoinBlogForum::where('status','1')->where('user_id',Auth::user()->id)->count();
        $get_message    = Message::where('sender',Auth::user()->id)->orderby('id','DESC')->get();
        return View('frontend.information.all_messages',compact('user_info','count_post','count_forums','get_message'));
    }
}
