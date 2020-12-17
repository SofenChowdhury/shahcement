<!-- QUICK POST -->
@include('frontend.includes.create_post')
@php
  use App\model\blog\Comment;use App\model\blog\PostReaction;
@endphp
<!-- /QUICK POST -->
@foreach($blog_post as $posts)
@php
  $images         = explode(',',$posts->image);
  $count_image    = count($images);
  $count_react    = PostReaction::where('post_id',$posts->id)->count();
  $count_comment  = Comment::where('post_id',$posts->id)->count();
@endphp
<!-- WIDGET BOX -->
<div class="widget-box no-padding">
  <div class="widget-box-settings">
    <div class="post-settings-wrap">
      <div class="post-settings widget-box-post-settings-dropdown-trigger">
        <svg class="post-settings-icon icon-more-dots">
          <use xlink:href="#svg-more-dots"></use>
        </svg>
      </div>
      <div class="simple-dropdown widget-box-post-settings-dropdown">
        <p class="simple-dropdown-link">Report Post</p>
        <p class="simple-dropdown-link">Report Author</p>
      </div>
    </div>
  </div>
  <div class="widget-box-status">
    <div class="widget-box-status-content">
      <div class="user-status">
        <a class="user-status-avatar" href="#">
          <div class="user-avatar small no-outline">
            <div class="user-avatar-content">
              <div class="hexagon-image-30-32" data-src="{{asset('assets/frontend/img/avatar/02.jpg')}}"></div>
            </div>
            <div class="user-avatar-progress">
              <div class="hexagon-progress-40-44"></div>
            </div>
            <div class="user-avatar-progress-border">
              <!-- HEXAGON -->
              <div class="hexagon-border-40-44"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS BORDER -->
        
            <!-- USER AVATAR BADGE -->
            <div class="user-avatar-badge">
              <!-- USER AVATAR BADGE BORDER -->
              <div class="user-avatar-badge-border">
                <!-- HEXAGON -->
                <div class="hexagon-22-24"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE BORDER -->
        
              <!-- USER AVATAR BADGE CONTENT -->
              <div class="user-avatar-badge-content">
                <!-- HEXAGON -->
                <div class="hexagon-dark-16-18"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE CONTENT -->
        
              <!-- USER AVATAR BADGE TEXT -->
              <p class="user-avatar-badge-text">19</p>
              <!-- /USER AVATAR BADGE TEXT -->
            </div>
            <!-- /USER AVATAR BADGE -->
          </div>
          <!-- /USER AVATAR -->
        </a>
        <!-- /USER STATUS AVATAR -->
    
        <!-- USER STATUS TITLE -->
        <p class="user-status-title medium"><a class="bold" href="#">{{$posts->name}}</a> uploaded <span class="bold">{{count($images)}} new photos</span></p>
            <p class="user-status-text small">{{ \Carbon\Carbon::parse($posts->updated_at)->diffForhumans() }}</p>
        <!-- /USER STATUS TITLE -->
      </div>
      <!-- /USER STATUS -->

      <!-- WIDGET BOX STATUS TEXT -->
      <p class="" style="font-weight: bold;padding-top: 10px;">{{$posts->post_title }}</p>
      <p class="widget-box-status-text">{!! substr($posts->description, 0,600) !!}@if(strlen($posts->description)>600) <a href="{{route('get_post_data',['id'=>$posts->id])}}" style="color: tomato;">+more </a>@endif </p>
      <!-- /WIDGET BOX STATUS TEXT -->
      @if($count_image == 1)
        <a href="{{route('get_post_data',['id'=>$posts->id])}}">
          @if (pathinfo($images[0], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[0], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[0], PATHINFO_EXTENSION) == 'png'or pathinfo($images[0], PATHINFO_EXTENSION) == 'gif')
          <div class="picture-collage-item popup-picture-trigger" onclick="triggerImage({{$posts->id }})">
            <div class="photo-preview">
                <!-- PHOTO PREVIEW IMAGE -->
                  <img src="{{asset($images[0])}}" alt="photo-preview-10" style="width: 100%;">
                <!-- /PHOTO PREVIEW IMAGE -->
            </div>
          </div>
          @else
          @if($images[0])
          <div class="">
            <video style="width: 100%;"controls style="margin-left: -14px;">
              <source src="{{asset($images[0])}}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          @endif
          @endif
        </a>
      @else
      <a href="{{route('get_post_data',['id'=>$posts->id])}}">
        <!-- PICTURE COLLAGE -->
        <div class="picture-collage">
          <!-- PICTURE COLLAGE ROW -->
          <div class="picture-collage-row medium">
            @for($i=0; $i < $count_image; $i++ )
            @if($i<=1)
            <!-- PICTURE COLLAGE ITEM -->
            <div class="picture-collage-item popup-picture-trigger">
              <!-- PHOTO PREVIEW -->
              <div class="photo-preview">
                @if (pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'png'or pathinfo($images[$i], PATHINFO_EXTENSION) == 'gif')
                <!-- PHOTO PREVIEW IMAGE -->
                <figure class="photo-preview-image liquid">
                  <img src="{{asset($images[$i])}}" alt="photo-preview-10">
                </figure>
                <!-- /PHOTO PREVIEW IMAGE -->
                @else
                <video style="width: 100%;"controls style="margin-left: -14px;">
                  <source src="{{asset($images[$i])}}" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                @endif
              </div>
              <!-- /PHOTO PREVIEW -->
            </div>
            <!-- /PICTURE COLLAGE ITEM -->

            @endif
            @endfor
          </div>
          <!-- /PICTURE COLLAGE ROW -->

          <!-- PICTURE COLLAGE ROW -->
          <div class="picture-collage-row">
            @for($i=2; $i < $count_image; $i++ )
            @if($i<=3)
            <!-- PICTURE COLLAGE ITEM -->
            <div class="picture-collage-item popup-picture-trigger">
              <!-- PHOTO PREVIEW -->
              <div class="photo-preview">
                @if (pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'png'or pathinfo($images[$i], PATHINFO_EXTENSION) == 'gif')
                <!-- PHOTO PREVIEW IMAGE -->
                <figure class="photo-preview-image liquid">
                  <img src="{{asset($images[$i])}}" alt="photo-preview-16">
                </figure>
                <!-- /PHOTO PREVIEW IMAGE -->
                @else
                <video style="width: 100%;"controls style="margin-left: -14px;">
                  <source src="{{asset($images[$i])}}" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                @endif
              </div>
              <!-- /PHOTO PREVIEW -->
            </div>
            <!-- /PICTURE COLLAGE ITEM -->
            @endif
            @endfor
            @if($count_image >4)
            <!-- PICTURE COLLAGE ITEM -->
            <div class="picture-collage-item">
              <!-- PICTURE COLLAGE ITEM OVERLAY -->
              <a class="picture-collage-item-overlay" href="#">
                <!-- PICTURE COLLAGE ITEM OVERLAY TEXT -->
                <p class="picture-collage-item-overlay-text">+More</p>
                <!-- /PICTURE COLLAGE ITEM OVERLAY TEXT -->
              </a>
              <!-- /PICTURE COLLAGE ITEM OVERLAY -->

              <!-- PHOTO PREVIEW -->
              <div class="photo-preview">
                @if (pathinfo($images[4], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[4], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[4], PATHINFO_EXTENSION) == 'png'or pathinfo($images[4], PATHINFO_EXTENSION) == 'gif')
                <!-- PHOTO PREVIEW IMAGE -->
                <figure class="photo-preview-image liquid">
                  <img src="{{asset($images[4])}}" alt="photo-preview-14">
                </figure>
                <!-- /PHOTO PREVIEW IMAGE -->
                @else
                <video style="width: 100%;"controls style="margin-left: -14px;">
                  <source src="{{asset($images[4])}}" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                @endif
                <!-- PHOTO PREVIEW INFO -->
                <div class="photo-preview-info">
                  <!-- REACTION COUNT LIST -->
                  <div class="reaction-count-list">
                    <!-- REACTION COUNT -->
                    <div class="reaction-count negative">
                      <!-- REACTION COUNT ICON -->
                      <svg class="reaction-count-icon icon-thumbs-up">
                        <use xlink:href="#svg-thumbs-up"></use>
                      </svg>
                      <!-- /REACTION COUNT ICON -->
            
                      <!-- REACTION COUNT TEXT -->
                      <p class="reaction-count-text">2</p>
                      <!-- /REACTION COUNT TEXT -->
                    </div>
                    <!-- /REACTION COUNT -->
            
                    <!-- REACTION COUNT -->
                    <div class="reaction-count negative">
                      <!-- REACTION COUNT ICON -->
                      <svg class="reaction-count-icon icon-comment">
                        <use xlink:href="#svg-comment"></use>
                      </svg>
                      <!-- /REACTION COUNT ICON -->
            
                      <!-- REACTION COUNT TEXT -->
                      <p class="reaction-count-text">5</p>
                      <!-- /REACTION COUNT TEXT -->
                    </div>
                    <!-- /REACTION COUNT -->
                  </div>
                  <!-- /REACTION COUNT LIST -->
                </div>
                <!-- /PHOTO PREVIEW INFO -->
              </div>
              <!-- /PHOTO PREVIEW -->
            </div>
            <!-- /PICTURE COLLAGE ITEM -->
            @endif
          </div>
          <!-- /PICTURE COLLAGE ROW -->
        </div>
        <!-- /PICTURE COLLAGE -->
      </a>
      @endif
      <!-- CONTENT ACTIONS -->
      <div class="content-actions">
        <!-- CONTENT ACTION -->
        <div class="content-action">
          <!-- META LINE -->
          <div class="meta-line">
            <!-- META LINE LIST -->
            <div class="meta-line-list reaction-item-list">
              <!-- REACTION ITEM -->
              <div class="reaction-item">
                <!-- REACTION IMAGE -->
                <img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('assets/frontend/img/reaction/like.png')}}" alt="reaction-like">
                <!-- /REACTION IMAGE -->
    
                <!-- SIMPLE DROPDOWN -->
                <div class="simple-dropdown padded reaction-item-dropdown">
                  <!-- SIMPLE DROPDOWN TEXT -->
                  <p class="simple-dropdown-text"><img class="reaction" src="{{asset('assets/frontend/img/reaction/like.png')}}" alt="reaction-like"> <span class="bold"> {{$count_react}} Like</span></p>
                  <!-- /SIMPLE DROPDOWN TEXT -->
                </div>
                <!-- /SIMPLE DROPDOWN -->
              </div>
              <!-- /REACTION ITEM -->
            </div>
            <!-- /META LINE LIST -->
    
            <!-- META LINE TEXT -->
            <p class="meta-line-text" id="react{{$posts->id}}">{{$count_react}}</p>

            <!-- /META LINE TEXT -->
          </div>
          <!-- /META LINE -->
        </div>
        <!-- /CONTENT ACTION -->
    
        <!-- CONTENT ACTION -->
        <div class="content-action">
          <!-- META LINE -->
          <div class="meta-line">
            <!-- META LINE LINK -->
            <p class="meta-line-link">{{$count_comment}} Comments</p>
            <!-- /META LINE LINK -->
          </div>
          <!-- /META LINE -->
    
          <!-- META LINE -->
          <div class="meta-line">
            <!-- META LINE TEXT -->
            <p class="meta-line-text">0 Shares</p>
            <!-- /META LINE TEXT -->
          </div>
          <!-- /META LINE -->
        </div>
        <!-- /CONTENT ACTION -->
      </div>
      <!-- /CONTENT ACTIONS -->
    </div>
    <!-- /WIDGET BOX STATUS CONTENT -->
  </div>
  <!-- /WIDGET BOX STATUS -->

  <!-- POST OPTIONS -->
  <div class="post-options">
    <!-- POST OPTION WRAP -->
    <div class="post-option-wrap">
      <!-- POST OPTION -->
      <div class="post-option reaction-options-dropdown-trigger">
        <!-- POST OPTION ICON -->
        <svg class="post-option-icon icon-thumbs-up">
          <use xlink:href="#svg-thumbs-up"></use>
        </svg>
        <!-- /POST OPTION ICON -->

        <!-- POST OPTION TEXT -->
        <p class="post-option-text">Like!</p>
        <!-- /POST OPTION TEXT -->
      </div>
      <!-- /POST OPTION -->

      <!-- REACTION OPTIONS -->
      <div class="reaction-options reaction-options-dropdown">
        <!-- REACTION OPTION -->
        <div class="reaction-option text-tooltip-tft" data-title="Like">
          <!-- REACTION OPTION IMAGE -->
          <img class="reaction-option-image" src="{{asset('assets/frontend/img/reaction/like.png')}}" alt="reaction-like" onclick="react_post(1,{{$posts->id}})">
          <!-- /REACTION OPTION IMAGE -->
        </div>
        <!-- /REACTION OPTION -->
      </div>
      <!-- /REACTION OPTIONS -->
    </div>
    <!-- /POST OPTION WRAP -->

    <!-- POST OPTION -->
    <div class="post-option">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{route('get_post_data',['id'=>$posts->id])}}&display=popup" target="_blank">
        <!-- POST OPTION ICON -->
        <svg class="post-option-icon icon-share">
          <use xlink:href="#svg-share"></use>
        </svg>
        <!-- /POST OPTION ICON -->

        <!-- POST OPTION TEXT -->
        <p class="post-option-text">Share</p>
        <!-- /POST OPTION TEXT -->
      </a>
      </div>
      <!-- /POST OPTION -->
  </div>
  <!-- /POST OPTIONS -->
  @php
    $get_comments = Comment::leftjoin('users','users.id','comments.user_id')
      ->where('comments.post_id',$posts->id)
      ->select('users.image','users.name','comments.*')
      ->get();
  @endphp
  @foreach($get_comments as $comments)
  <div class="row" style="padding-bottom: 15px;">
    <span>
      <img src="{{asset($comments->image)}}" style="border-radius:50px;width:30px;margin-left: 20px;margin-right: 10px;" >
    </span>
    <span style="width: 80%">
      <p>
        <span style="color: #ed2124;font-weight: bold;">{{$comments->name}}</span> {{$comments->comment}}
      </p>
    </span>
  </div>
  @endforeach
  <div class="row" style="padding-bottom: 15px;" id="push_post{{$posts->id}}">
        
  </div>
  {{-- Comment Post part Start --}}
  <div class="row" style="padding-bottom: 15px;">
    <span>
      
      <img src="{{Auth::user()->image}}" style="border-radius:50px;width:50px;margin-left: 20px;margin-right: 10px;" >
    </span>
    <span style="width: 80%">
      <textarea class="form-control" placeholder="@if(Auth::user()){{Auth::user()->name}}@else Guest @endif please Comments here" name="comment" id="comment{{$posts->id}}"></textarea>
      <p class="btn btn-danger" id="submit_comment" onclick="post_comment({{$posts->id}})" style="float: right;border-radius: 0px; background-color: #ed2124;">Post</p>
    </span>
  </div>
  {{-- Comment Post part End --}}
</div>
<!-- /WIDGET BOX -->
@endforeach
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
              '<img src="'+user_image+'" style="border-radius:50px;width:50px;margin-left: 20px;margin-right: 10px;" >'+
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

<script type="text/javascript">
  function joinForum(id,id2) {
    console.log(id2);
    var status = id2;
    if (status == '1'){

      $.ajax({
          url: "{{ url('join_group') }}"+'/'+id+'/'+1,
          method: "get",
          success: function(data){
            if(data){
              $('#join_'+id).find('p').hide();
              $('#join_'+id).append('<p class="button success" onclick="leaveForum('+id+','+status+')" style="background-color:green;"><i class="lni lni-protection"></i></p>');
            }
          }
        });
    }else{
      $.ajax({
          url: "{{ url('join_group') }}"+'/'+id+'/'+0,
          method: "get",
          success: function(data){
            if(data){
              $('#join_'+id).find('p').hide();
              $('#join_'+id).append('<p class="button success" onclick="leaveForum('+id+','+status+')" style="background-color:blue;"><i class="lni lni-spinner"></i></p>');
            }
          }
        });
    }
    
  }
  function leaveForum(id,id2){
    console.log(id);
    $.ajax({
        url: "{{ url('join_group') }}"+'/'+id+'/'+2,
        method: "get",
        success: function(data){
          if(data){
            $('#join_'+id).empty();
            $('#join_'+id).append('<p class="button secondary" onclick="joinForum('+id+','+id2+')">'+
                            '<svg class="button-icon icon-join-group">'+
                              '<use xlink:href="#svg-join-group"></use>'+
                            '</svg>'+
                          '</p>');
          }
        }
      });
    
  }
</script>
