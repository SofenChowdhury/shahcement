@extends('layouts.frontend_layout')
@section('contents')
@php
    use App\model\forums\JoinBlogForum;
    use App\model\SetupSite;
    $get_site_settings = SetupSite::first();
@endphp
<!-- CONTENT GRID -->
  <div class="content-grid" style="margin-left:2%; padding-top:7% !important;">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-9" style="background-color: white;">
        
        <div class="row">
          @foreach($images as $key_image)
          @if (pathinfo($key_image, PATHINFO_EXTENSION) == 'jpg' or pathinfo($key_image, PATHINFO_EXTENSION) == 'jpeg' or pathinfo($key_image, PATHINFO_EXTENSION) == 'png'or pathinfo($key_image, PATHINFO_EXTENSION) == 'gif')

          <div class="col-6">
            <img class="img-fluid rounded" src="{{asset($key_image)}}" alt="">
          </div>
          @else

          <div class="col-12">
            @if($images[0])
            <video style="width: 100%;"controls style="margin-left: -14px;">
              <source src="{{asset($images[0])}}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
            @endif
          </div>
          @endif
          @endforeach
        </div>
        <h1 class="mt-4">{{$blog_post->post_title}}</h1>
        <p>
          by
          <a href="#" style="color: #ed2124;font-weight: bold;">{{$blog_post->name}}</a>
          Posted - {{ \Carbon\Carbon::parse($blog_post->updated_at)->diffForhumans() }}
        </p>
        <hr>
        <!-- Post Content -->
        <p class="" style="line-height: 1.5em;">
          {!! $blog_post->description !!}
        </p>
        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3" id="comment{{$blog_post->id}}" placeholder="Please Comment Here ........."></textarea>
              </div>
              <button type="button" class="btn btn-primary"  onclick="post_comment({{$blog_post->id}})">Submit</button>
            </form>
          </div>
        </div>
        @foreach($get_comment as $comment)
        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="{{asset($comment->image)}}" alt="" style="width: 48px;height: 50px;">
          <div class="media-body">
            <h5 class="mt-0" style="color: #ed2124;font-weight: bold;">{{$comment->name}}</h5>
            {{$comment->comment}}
          </div>
        </div>
        @endforeach
        <div class="row" style="padding-bottom: 15px;" id="push_post{{$blog_post->id}}">
        
        </div>
      </div>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-3" >
        <!-- WIDGET BOX -->
        <div class="widget-box">      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">ফোরাম</p>
          <!-- /WIDGET BOX TITLE -->
      
          <!-- WIDGET BOX CONTENT -->
          @foreach($get_forum as $formums)
                @php
                  $checkJoin = JoinBlogForum::where('forum_id',$formums->id)
                    ->where('user_id',Auth::user()->id)
                    ->first();
                @endphp
              <div class="user-preview landscape" style="border-radius: 0px;margin-bottom: 10px;padding-left:0px;">
                  
                  <img src="{{asset($formums->avatar)}}" alt="cover-08" style="width: 30px;">
                  <div class="user-preview-info">
                    <div class="user-short-description landscape tiny" style="width: 50%;">
                        <p class="user-short-description-title">
                          <a href="{{route('blog_forums',['id'=>$formums->id])}}">{{$formums->title}}</a>
                        </p>
                    </div>
                    <div class="user-preview-actions">
                        <span id="join_{{$formums->id}}">
                          @if($checkJoin)
                          @if($checkJoin->status == '1')
                          {{-- Approved --}}
                          <p class="button success" onclick="leaveForum({{$formums->id}},{{$formums->type}})" style="background-color:green; width:40px;height:40px;">
                              <i class="lni lni-protection"></i>
                              </p>
                          @elseif($checkJoin->status == '0')
                          {{-- Pending --}}
                          <p class="button success" onclick="leaveForum({{$formums->id}},{{$formums->type}})" style="background-color:blue; width:40px;height:40px;"><i class="lni lni-spinner"></i></p>
                          @else
                          {{-- No Action --}}
                            <p class="button secondary" onclick="joinForum({{$formums->id}},{{$formums->type}})"  style="width:40px; height:40px;">
                              <svg class="button-icon icon-join-group">
                                <use xlink:href="#svg-join-group"></use>
                              </svg>
                            </p>
                          @endif
                          @else
                          {{-- No Action --}}
                            <p class="button secondary" onclick="joinForum({{$formums->id}},{{$formums->type}})" style="width:40px; height:40px;">
                              <svg class="button-icon icon-join-group">
                                <use xlink:href="#svg-join-group"></use>
                              </svg>
                            </p>
                          @endif
                        </span>
                    </div>
                  </div>
              </div>
            @endforeach
          <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
    </div>
  </div>
  <!-- /CONTENT GRID -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    function post_comment($post_id){
      var post_id = $post_id;
      var post_comment = $('#comment'+post_id).val();
      var user_image = '{{Auth::user()->image}}';
      var user_name = '{{Auth::user()->name}}';
      $('#comment'+post_id).val('');
      console.log(post_comment);
      $.ajax({
          url: "{{ url('post_comment') }}",
          method: "get",
          data: {post_id:post_id,post_comment:post_comment},
          success: function(data){
            if (post_comment) {

               $('#push_post'+post_id).append('<span>'+
                '<img src="{{asset('/')}}'+user_image+'" style="border-radius:100px;width:48px;height:50px;margin-left: 20px;margin-right: 10px;" >'+
              '</span>'+
              '<span style="width: 80%">'+
                '<p>'+
                  '<span style="color: #ed2124;font-weight: bold;">'+user_name+'</span> <span>'+
                    post_comment+
                  '</span>'+
                '</p>'+
              '</span>');
             }else{
              alert('Please Type a comment first');
             }
          }
        });
    }

    function react_post($id,$post_id){
      var auth = {{Auth::user()->id}};
      var post_id = $post_id;
      var react_id = $id;
      if (auth) {
        $.ajax({
          url: "{{ url('react_post') }}",
          method: "get",
          data: {post_id:$post_id,react_id:$id},
          success: function(data){
            var count_react = $('#react'+post_id).text();
            console.log(count_react);

            $('#react'+post_id).empty();
            $('#react'+post_id).text(parseInt(count_react)+1);
            
          }
        });
      }else{
        alert('Please Login First');
      }
    }
</script>
@stop