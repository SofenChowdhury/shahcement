@extends('layouts.frontend_layout')
@section('contents')
<div class="content-grid"style="margin-top: 30px;margin-bottom: 10px;">
	<section class="section">
	  <div class="section-header">
	    <div class="section-header-info">
	    </div>
	  </div>
	  	<div class="row">
	  		@foreach($get_videos as $video)
	  		<div class="col-md-3" style="padding-top: 10px;padding-bottom: 10px;">
			    <div class="user-preview small" Style="border-radius:20px !important">
			      	<embed
					    src="{{$video->video_link}}"
					    wmode="transparent"
					    type="video/mp4"
					    width="100%" height="100%"
					    allow="autoplay; encrypted-media; picture-in-picture"
					    allowfullscreen
					    title="Keyboard Cat"
					  >
			      	{{-- <div class="user-preview-info" style="height:55px;overflow-y:hidden;">
				        <div class="user-short-description small">
				          	<p class="user-short-description-title">
				          		<a href="#">{{$video->title}}</a>
				          	</p>
				        </div>
			      	</div> --}}
			      	<div class="user-preview-footer" style="background-color: #ed2124;">
			      		<a href="{{asset($video->video_link)}}">
					        <p class="abc" style="font-size: 16px;color: white;text-align: left;"> &nbsp &nbsp 
					               &nbsp &nbsp &nbsp &nbsp  
					        </p>
					    </a>
					    <!---->
					    <a href="https://www.facebook.com/sharer/sharer.php?u={{asset($video->video_link)}}&display=popup" target="_blank">
					        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
					            <i class="lni lni-facebook-oval"></i> &nbsp &nbsp &nbsp 
					        </p>
					    </a>
					    <a href="https://wa.me/?text={{asset($video->video_link)}}&display=popup" target="_blank">
					        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
					            &nbsp&nbsp<i class="lni lni-whatsapp"></i> &nbsp &nbsp &nbsp 
					        </p>
					    </a>
					    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{asset($video->video_link)}}&display=popup" target="_blank">
					        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
					            &nbsp&nbsp<i class="lni lni-linkedin-original"></i> &nbsp &nbsp &nbsp 
					        </p>
					    </a>
					    <a  href="http://www.twitter.com/share?url={{asset($video->video_link)}}&display=popup" target="_blank">
					        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
					            &nbsp&nbsp<i class="lni lni-twitter-original"></i> &nbsp &nbsp &nbsp 
					        </p>
					    </a>
			      	</div>
			    </div>
			</div>
		    @endforeach
	  	</div>
	</section>
</div>
@stop