@extends('layouts.frontend_layout')
@section('contents')
<!-- CONTENT GRID -->
  <div class="content-grid">
    <!-- PROFILE HEADER -->
    <div class="profile-header" style="border-radius: 0px;margin-top: -1.5%;">
	  	<figure class="profile-header-cover liquid" style="border-radius: 0px;">
	    	<img src="https://126544-362384-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/2018/07/Shah-Cement.jpg" alt="cover-01">
	  	</figure>
	  	<div class="profile-header-info">
	        <div class="user-short-description big">
	          	<a class="user-short-description-avatar user-avatar big" href="#" id="nv_edit_profile">
		            <div class="user-avatar-border">
		              <div class="hexagon-148-164"></div>
		            </div>
		            <div class="user-avatar-content">
		              <div class="hexagon-image-100-110" data-src="{{asset(Auth::user()->image)}}"></div>
		            </div>
		            <div class="user-avatar-progress">
		              <div class="hexagon-progress-124-136"></div>
		            </div>
		            <div class="user-avatar-progress-border">
		              <div class="hexagon-border-124-136"></div>
		            </div>
		            <div class="user-avatar-badge">
		              	<div class="user-avatar-badge-border">
			                <div class="hexagon-40-44"></div>
		              	</div>
		              	<div class="user-avatar-badge-content">
		                	<div class="hexagon-dark-32-34"></div>
		              	</div>
		              	<p class="user-avatar-badge-text"><i class="lni lni-pencil-alt"></i></p>
		            </div>
	          	</a>
		        <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium" href="{{route('profile')}}">
		            <div class="user-avatar-border">
		              <div class="hexagon-120-132"></div>
		            </div>
		            <div class="user-avatar-content">
		              <div class="hexagon-image-82-90" data-src="{{asset(Auth::user()->image)}}"></div>
		            </div>
		            <div class="user-avatar-progress">
		              <div class="hexagon-progress-100-110"></div>
		            </div>
		            <div class="user-avatar-progress-border">
		              <div class="hexagon-border-100-110"></div>
		            </div>
		            <div class="user-avatar-badge">
		              	<div class="user-avatar-badge-border">
			                <div class="hexagon-32-36"></div>
		              	</div>
		              	<div class="user-avatar-badge-content">
			                <div class="hexagon-dark-26-28"></div>
		              	</div>
		              	<p class="user-avatar-badge-text">24</p>
		            </div>
		        </a>
	          	<p class="user-short-description-title"><a href="{{route('profile')}}">{{Auth::user()->name}}</a></p>
	          	<p class="user-short-description-text"><a href="#">{{Auth::user()->email}}</a></p>
	        </div>
	        <div class="user-stats">
	          	<div class="user-stat big">
		            <p class="user-stat-title">{{$count_post}}</p>
		            <p class="user-stat-text">posts</p>
	          	</div>
	          	<div class="user-stat big">
		            <p class="user-stat-title">{{$count_forums}}</p>
		            <p class="user-stat-text">Forums</p>
	          	</div>
	          	<div class="user-stat big">
		            <img class="user-stat-image" src="{{asset('assets/frontend/img/flag/bangladesh.png')}}" alt="flag-usa">
		            <p class="user-stat-text">{{$user_info->country}}</p>
	          	</div>
	        </div>
	  	</div>
	</div>
    <!-- /PROFILE HEADER -->
  </div>
  <!-- /CONTENT GRID -->
  @php
  	use App\model\RepliedMessage;
  @endphp
  <div class="content-grid"style="margin-top: 7px;margin-bottom: 10px;margin-left: 20px;">
    	<div class="grid">

		  	@foreach($get_message as $message)
		  	@php
		  		$replied_messages = RepliedMessage::leftjoin('users','users.id','replied_messages.replied_by')
		  			->select('users.name','users.image','replied_messages.*')
		  			->where('replied_messages.message_id',$message->id)
		  			->get();
		  	@endphp
		    <div class="user-preview-info" style="background-color: tomato;">
	            <div class="user-short-description landscape tiny" style="height:100px;padding-bottom:5px;">
	                <a class="user-short-description-avatar user-avatar small no-stats" href="#">
	                  <div class="user-avatar-border">
	                      <div class="hexagon-50-56"></div>
	                  </div>
	                  <div class="user-avatar-content">
	                    <div class="hexagon-image-40-44" data-src="{{asset(Auth::user()->image)}}"></div>
	                  </div>
	                </a>
	                <p class="user-short-description-title"><a href="#">{{$message->title}}</a></p>
	                <p class="user-short-description-text" style="color:black">{{$message->message}}</p>
	            </div>
	        </div>
	        @foreach($replied_messages as $replied)
	        
		        <div class="user-preview-info" style="background-color: lightgray;">
		            <div class="user-short-description landscape tiny" style="height:100px;padding-bottom:5px;">
		                <a class="user-short-description-avatar user-avatar small no-stats" href="#">
		                  <div class="user-avatar-border">
		                      <div class="hexagon-50-56"></div>
		                  </div>
		                  <div class="user-avatar-content">
		                    <div class="hexagon-image-40-44" data-src="{{asset($replied->image)}}"></div>
		                  </div>
		                </a>
		                <p class="user-short-description-title"><a href="#">Replied by {{$replied->name}}</a></p>
		                <p class="user-short-description-text" style="color:black">{{$replied->replied_message}}</p>
		            </div>
		        </div>
	        @endforeach
	        @endforeach
    	</div>
	</div>
@stop