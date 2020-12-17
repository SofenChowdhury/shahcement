@extends('layouts.frontend_layout')
@section('contents')

<div class="content-grid"style="margin-top: 30px;margin-bottom: 10px;">
	<section class="section">
	  <div class="section-filters-bar v2" style="margin-bottom: 20px;">
		    <form class="form" method="GET" action="{{ route('searchRule') }}" enctype="multipart/form-data">
		      @csrf()
		      <div class="form-item split medium">
		        <div class="form-select" style="width: 100%;">
		          <input type="text" name="title" class="form-control" placeholder="নির্মাণ নিয়মাবলী ...">
		        </div>
		        <button type="submit" class="button secondary">নির্মাণ নিয়মাবলী অনুসন্ধান</button>
		      </div>
		    </form>
		</div>
	  	<div class="grid grid-3-3-3-3 centered">
	  		@foreach($get_const_rule as $const_rule)
		    <div class="user-preview small" Style="border-radius:20px !important">
		        <a href="{{asset($const_rule->file)}}">
		      	<figure class="user-preview-cover liquid">
		        	<img src="{{asset($const_rule->image)}}" alt="cover-04">
		      	</figure>
		      	</a>
		      	<div class="user-preview-info" style="height:55px;overflow-y:hidden;">
			        <div class="user-short-description small">
			          	<p class="user-short-description-title">
			          		<a href="{{asset($const_rule->file)}}">{{$const_rule->title}}</a>
			          	</p>
			          	 
			          	<p class="user-short-description-text">
			          		<a href="#">{{$const_rule->description}}</a>
			          	</p>
			          	@if($const_rule->website)
			          	<p class="" style="text-align: left;font-size: 13px;line-height: 13px;">
			          		<a href="#"><i class="lni lni-world"></i> {{$const_rule->website}}</a>
			          	</p>
			          	@endif
			          	@if($const_rule->address)
			          	<p class="" style="text-align: left;font-size: 13px;line-height: 30px;">
			          		<a href="#"><i class="lni lni-direction"></i> {{$const_rule->address}}</a>
			          	</p>
			          	@endif
			        </div>
			       
		      	</div>
		      	<div class="user-preview-footer" style="background-color: #ed2124;padding-top:5px;">
		      		<a href="{{asset($const_rule->file)}}">
				        <p class="abc" style="font-size: 16px;color: white;text-align: left;"> &nbsp &nbsp 
				            <i class="lni lni-download"></i> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
				        </p>
				    </a>
				    <!---->
				    <a href="https://www.facebook.com/sharer/sharer.php?u={{asset($const_rule->file)}}&display=popup" target="_blank">
				        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
				            <i class="lni lni-facebook-oval"></i>
				            
				        </p>
				        
				    </a>
				    <a href="https://wa.me/?text={{asset($const_rule->file)}}&display=popup" target="_blank">
				        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
				            &nbsp&nbsp<i class="lni lni-whatsapp"></i>
				            
				        </p>
				        
				    </a>
				    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{asset($const_rule->file)}}&display=popup" target="_blank">
				        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
				            &nbsp&nbsp<i class="lni lni-linkedin-original"></i>
				            
				        </p>
				        
				    </a>
				    <a  href="http://www.twitter.com/share?url={{asset($const_rule->file)}}&display=popup" target="_blank">
				        <p class="abc" style="font-size: 16px;color: white;text-align: right;">
				            &nbsp&nbsp<i class="lni lni-twitter-original"></i>
				            
				        </p>
				        
				    </a>
				    <!--<a href="fb-messenger://share/?link=http://url-you-want-to-share.com&app_id={{asset($const_rule->file)}}&display=popup" target="_blank">-->
				    <!--    <p class="abc" style="font-size: 16px;color: white;text-align: right;">-->
				    <!--        &nbsp&nbsp<i class="lni lni-facebook-messenger"></i>-->
				            
				    <!--    </p>-->
				        
				    <!--</a>-->
				    
		      	</div>
		    </div>
		    @endforeach
	  	</div>
	</section>
</div>
@stop