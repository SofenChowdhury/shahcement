@extends('layouts.frontend_layout')
@section('contents')
<div class="content-grid"style="padding-left:10%;margin-bottom: 10px;padding-top:7% !important;">
    <h2 class="section-title">Latest Photos</h2>
    <div class="row">
      @foreach($get_gallery as $gallery)
        <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="padding-left:5px;padding-right:5px;">
            <a href="{{asset($gallery->image)}}" class="fancybox" rel="ligthbox">
                <div class="galleryImage">
                    <img  src="{{asset($gallery->image)}}" class="zoom img-fluid " alt="{{$gallery->title}}">
                </div>
            </a>
        </div>
      @endforeach  
   </div>
</div>
<style>
    .fancybox-skin{
        background-color:transparent !important;
    }
    .fancybox-opened .fancybox-skin{
        -webkit-box-shadow:0 0 0 rgba(0,0,0,.5) !important;
    }
    .fancybox-image{
        /*max-height:70% !important;*/
        margin-top:10% !important;
    }
    .fancybox-close{
        margin-top:10% !important;
    }
    .galleryImage:hover{
        box-shadow: 10px 6px 7px -5px rgba(0,0,0,0.75);
    }
    .green{
        background-color:#6fb936;
    }

    .page-top{
        margin-top:85px;
    }

     
    img.zoom {
        width: 100%;
        height: 200px;
         /*border-radius:5px;*/
        object-fit:cover;
      
    }
    
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
  $(document).ready(function(){
    $(".fancybox").fancybox({
          openEffect: "none",
          closeEffect: "none"
      });
      
      $(".zoom").hover(function(){
      
      $(this).addClass('transition');
    }, function(){
      $(this).removeClass('transition');
    });
  });
</script>
@stop