<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\model\Message;use App\model\RepliedMessage;
class MessageController extends Controller
{
    public function Index(){
    	$title = 'Inbox';
    	$get_message = Message::leftjoin('users','users.id','messages.sender')
    		->select('users.id as user_id','users.name','messages.*')
    		->get();

    	return View('admin.inbox.index',compact('title','get_message'));
    }
    public function getMessages($id){
    	$title = 'Inbox';
    	return $get_message = Message::leftjoin('users','users.id','messages.sender')
    		->select('users.id as user_id','users.name','messages.*')
    		->where('messages.id',$id)
    		->first();
    }
    public function replied_messages($id){
    	$title = 'Inbox';
    	return $get_message = RepliedMessage::where('message_id',$id)
    		->get();
    }
    public function Replay(Request $request){

    	$rules = array(
            'replied_message' => 'required',
        );
        $this->validate($request, $rules);

        $replayMessage = New RepliedMessage();

        $replayMessage->message_id	 	= $request->id;
        $replayMessage->replied_to	 	= $request->user_id;
        $replayMessage->replied_by 		= Auth::user()->id;
        $replayMessage->replied_message	= $request->replied_message;
		
        $replayMessage->save();

        Alert::toast('Message Replied Successfully !', 'success');

        return redirect()->back();
    }
}
