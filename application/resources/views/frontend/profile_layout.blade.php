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

    <!-- SECTION NAVIGATION -->
    <nav class="section-navigation" style="margin-bottom: 1.5%;">
	  	<div id="section-navigation-slider" class="section-menu">
		    <a class="section-menu-item nv_timeline active" href="#" id="nv_timeline">
		      	<svg class="section-menu-item-icon icon-timeline">
		        	<use xlink:href="#svg-timeline"></use>
		      	</svg>
		      	<p class="section-menu-item-text">Timeline</p>
		    </a>
		    <a class="section-menu-item nv_about" href="#" id="nv_about">
		      	<svg class="section-menu-item-icon icon-profile">
		        	<use xlink:href="#svg-profile"></use>
		      	</svg>
		      	<p class="section-menu-item-text">About</p>
		    </a>
		    <a class="section-menu-item nv_group" href="#" id="nv_group">
		      	<svg class="section-menu-item-icon icon-group">
		        	<use xlink:href="#svg-group"></use>
		      	</svg>
		      	<p class="section-menu-item-text">Forums</p>
		    </a>
		    {{-- <a class="section-menu-item nv_photos" href="#" id="nv_photos">
		      	<svg class="section-menu-item-icon icon-photos">
		        	<use xlink:href="#svg-photos"></use>
		      	</svg>
		      	<p class="section-menu-item-text">Photos</p>
		    </a>
		    <a class="section-menu-item nv_videos" href="#" id="nv_videos">
		      	<svg class="section-menu-item-icon icon-videos">
		        	<use xlink:href="#svg-videos"></use>
		      	</svg>
		      	<p class="section-menu-item-text">Videos</p>
		    </a> --}}
		  	<div id="section-navigation-slider-controls" class="slider-controls">
		        <div class="slider-control left">
		          <svg class="slider-control-icon icon-small-arrow">
		            <use xlink:href="#svg-small-arrow"></use>
		          </svg>
		        </div>
		        <div class="slider-control right">
		          <svg class="slider-control-icon icon-small-arrow">
		            <use xlink:href="#svg-small-arrow"></use>
		          </svg>
		        </div>
		  	</div>
	  	</div>
	</nav>
    <!-- /SECTION NAVIGATION -->
    <div id="profile_contents">
    	
    </div>
  </div>
  <!-- /CONTENT GRID -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$.ajax({
        url: "{{ url('profile/timeline') }}",
        method: 'get',
        success: function(result){
            $('#profile_contents').empty();
            $('#profile_contents').html(result);
            $('.nv_timeline').addClass('active')
            $('.nv_about').removeClass('active')
            $('.nv_group').removeClass('active')
            $('.nv_photos').removeClass('active')
            $('.nv_videos').removeClass('active')
        }
    });
	$('#nv_timeline').click(function(event){
		event.preventDefault();
		$.ajax({
            url: "{{ url('profile/timeline') }}",
            method: 'get',
            success: function(result){
                $('#profile_contents').empty();
                $('#profile_contents').html(result);
                $('.nv_timeline').addClass('active')
                $('.nv_about').removeClass('active')
                $('.nv_group').removeClass('active')
                $('.nv_photos').removeClass('active')
                $('.nv_videos').removeClass('active')
            }
        });
	});
	$('#nv_about').click(function(event){
		event.preventDefault();
		$.ajax({
            url: "{{ url('profile/about') }}",
            method: 'get',
            success: function(result){
                $('#profile_contents').empty();
                $('#profile_contents').html(result);
                $('.nv_timeline').removeClass('active')
                $('.nv_about').addClass('active')
                $('.nv_group').removeClass('active')
                $('.nv_photos').removeClass('active')
                $('.nv_videos').removeClass('active')
            }
        });
	});
	$('#nv_group').click(function(event){
		event.preventDefault();
		$.ajax({
            url: "{{ url('profile/groups') }}",
            method: 'get',
            success: function(result){
                $('#profile_contents').empty();
                $('#profile_contents').html(result);
                $('.nv_timeline').removeClass('active')
                $('.nv_about').removeClass('active')
                $('.nv_group').addClass('active')
                $('.nv_photos').removeClass('active')
                $('.nv_videos').removeClass('active')
            }
        });
	});
	$('#nv_photos').click(function(event){
		event.preventDefault();
		$.ajax({
            url: "{{ url('profile/photos') }}",
            method: 'get',
            success: function(result){
                $('#profile_contents').empty();
                $('#profile_contents').html(result);
                $('.nv_timeline').removeClass('active')
                $('.nv_about').removeClass('active')
                $('.nv_group').removeClass('active')
                $('.nv_photos').addClass('active')
                $('.nv_videos').removeClass('active')
            }
        });
	});
	$('#nv_videos').click(function(event){
		event.preventDefault();
		$.ajax({
            url: "{{ url('profile/videos') }}",
            method: 'get',
            success: function(result){
                console.log(result)
                $('#profile_contents').empty();
                $('#profile_contents').html(result);
                $('.nv_timeline').removeClass('active')
                $('.nv_about').removeClass('active')
                $('.nv_group').removeClass('active')
                $('.nv_photos').removeClass('active')
                $('.nv_videos').addClass('active')
            }
        });
	});
	$('#nv_edit_profile').click(function(event){
		event.preventDefault();
		$.ajax({
            url: "{{ url('profile/edit') }}",
            method: 'get',
            success: function(result){
                console.log(result)
                $('#profile_contents').empty();
                $('#profile_contents').html(result);
                $('.nv_timeline').removeClass('active')
                $('.nv_about').removeClass('active')
                $('.nv_group').removeClass('active')
                $('.nv_photos').removeClass('active')
                $('.nv_videos').removeClass('active')
            }
        });
	});
	// $('.sidemenu-trigger').click(function(){
	// 	console.log('test');
	// 	var clicks = $(this).data('clicks');
	//   	if (clicks) {
	// 	    $('.navigation-desktop').removeClass('hidden');
	// 		$('.navigation-desktop').addClass('delayed');
	// 		$('.main-navigation-desktop').addClass('delayed');
	//   	} else {
	//      	$('.navigation-desktop').removeClass('delayed');
	// 		$('.main-navigation-desktop').addClass('delayed');
	// 		$('.navigation-desktop').addClass('hidden');
	//   	}
	//   $(this).data("clicks", !clicks);
		
	// })
</script>
@stop