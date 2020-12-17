
<!-- GRID -->
<div class="grid grid-3-6-3 mobile-prefer-content">
  <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">About Me</p>
          <!-- /WIDGET BOX TITLE -->
      
          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- PARAGRAPH -->
            <p class="paragraph">{!! $user_info->about_me !!}</p>
            <!-- /PARAGRAPH -->
      
            <!-- INFORMATION LINE LIST -->
            <div class="information-line-list">
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Join Date</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{date('dM Y', strtotime( $user_info->updated_at ))}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Address</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$user_info->city}}, {{$user_info->country}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Age</p>
                <!-- /INFORMATION LINE TITLE -->
                @php

                  $date1=date_create($user_info->birth_date);
                  $date2=date_create(date('Y-m-d'));
                  $diff=date_diff($date1,$date2);

                @endphp
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">+{{$diff->format("%Y")}} Years</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
      
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Web</p>
                <!-- /INFORMATION LINE TITLE -->
      
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$user_info->website}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
        <div class="widget-box">
          <p class="widget-box-title">Personal Info</p>
          <div class="widget-box-content">
            <div class="information-line-list">
              <div class="information-line">
                <p class="information-line-title">Email</p>
                <p class="information-line-text">{{Auth::user()->email}}</p>
              </div>
              <div class="information-line">
                <p class="information-line-title">Birth Date</p>
                <p class="information-line-text">{{date('dM Y',strtotime($user_info->birth_date))}}</p>
              </div>
              <div class="information-line">
                <p class="information-line-title">Occupation</p>
                <p class="information-line-text">{{$user_info->occupation}}</p>
              </div>
            </div>
          </div>
        </div>
    </div>
  <!-- /GRID COLUMN -->

  <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <!-- QUICK POST -->
    {{-- @include('frontend.includes.create_post') --}}
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
        <!-- WIDGET BOX STATUS -->
        <div class="widget-box-status">
          <!-- WIDGET BOX STATUS CONTENT -->
          <div class="widget-box-status-content">
            <!-- USER STATUS -->
            <div class="user-status">
              <!-- USER STATUS AVATAR -->
              <a class="user-status-avatar" href="{{route('get_post_data',['id'=>$posts->id])}}">
                <!-- USER AVATAR -->
                <div class="">
                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    <img class="" src="{{asset($posts->user_image)}}" style="width: 48px; height: 50px;border-radius: 100px;margin-right: 20px;">
                  </div>
                  <!-- /USER AVATAR CONTENT -->
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
            <p class="widget-box-status-text">{!! substr($posts->description, 0,100) !!}...</p>
            <a href="{{route('get_post_data',['id'=>$posts->id])}}"> 
              <!-- /WIDGET BOX STATUS TEXT -->
              @if($count_image == 1)
                @if (pathinfo($images[0], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[0], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[0], PATHINFO_EXTENSION) == 'png' or pathinfo($images[0], PATHINFO_EXTENSION) == 'gif')
                <div class="picture-collage-item popup-picture-trigger">
                  <div class="photo-preview">
                    <!-- PHOTO PREVIEW IMAGE -->
                      <img src="{{asset($images[0])}}" alt="photo-preview-10" style="width: 100%;">
                    <!-- /PHOTO PREVIEW IMAGE -->
                  </div>
                </div>
                @else
                <div class="">
                  <video style="width: 100%;"controls style="margin-left: -14px;">
                    <source src="{{asset($images[0])}}" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </div>
                @endif
              @else
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
                      @if (pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'png' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'gif')
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
                      @if (pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'png' or pathinfo($images[$i], PATHINFO_EXTENSION) == 'gif')
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
                    <a class="picture-collage-item-overlay" href="profile-photos.html">
                      <!-- PICTURE COLLAGE ITEM OVERLAY TEXT -->
                      <p class="picture-collage-item-overlay-text">+More</p>
                      <!-- /PICTURE COLLAGE ITEM OVERLAY TEXT -->
                    </a>
                    <!-- /PICTURE COLLAGE ITEM OVERLAY -->

                    <!-- PHOTO PREVIEW -->
                    <div class="photo-preview">
                      @if (pathinfo($images[4], PATHINFO_EXTENSION) == 'jpg' or pathinfo($images[4], PATHINFO_EXTENSION) == 'jpeg' or pathinfo($images[4], PATHINFO_EXTENSION) == 'png')
                      <!-- PHOTO PREVIEW IMAGE -->
                      <figure class="photo-preview-image liquid">
                        <img src="{{asset($images[4])}}" alt="photo-preview-14">
                      </figure>
                      <!-- /PHOTO PREVIEW IMAGE -->
                      @else
                      <iframe src="https://www.youtube.com/embed/rk-wIgg9fNk" allowfullscreen></iframe>
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
              @endif
            </a>
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
            <svg class="post-option-icon icon-thumbs-up" onclick="react_post(1,{{$posts->id}})">
              <use xlink:href="#svg-thumbs-up"></use>
            </svg>
            <!-- /POST OPTION ICON -->

            <!-- POST OPTION TEXT -->
            <p class="post-option-text">Like!</p>
            <!-- /POST OPTION TEXT -->
          </div>
          <!-- /POST OPTION -->
        </div>
        <!-- /POST OPTION WRAP -->

        <!-- POST OPTION -->
        <div class="post-option">
          <!-- POST OPTION ICON -->
          <svg class="post-option-icon icon-share">
            <use xlink:href="#svg-share"></use>
          </svg>
          <!-- /POST OPTION ICON -->

          <!-- POST OPTION TEXT -->
          <p class="post-option-text">Share</p>
          <!-- /POST OPTION TEXT -->
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

        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">My Joined Forums</p>
          <!-- /WIDGET BOX TITLE -->
      
          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">      
            <!-- USER STATUS LIST -->
            @foreach($my_forums as $forum)
            <div class="stat-block">
              <div class="stat-block-decoration">
                <img src="{{asset($forum->avatar)}}" style="width: 60px;height: 60px;border-radius: 100px;">
              </div>
              <div class="stat-block-info">
                <p class="stat-block-title">{{$forum->title}}</p>
                <p class="stat-block-text">{{ \Carbon\Carbon::parse($forum->updated_at)->diffForhumans() }}</p>
              </div>
            </div>
            @endforeach
            <!-- /USER STATUS LIST -->
          </div>
          <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
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
          console.log($('#react'+post_id+react_id).text());
          
          $('#react'+post_id).empty();
          if(react_id == 1){
            $('#react'+post_id).html('<img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('assets/frontend/img/reaction/like.png')}}" alt="reaction-like">');
          }else if(react_id == 2){
            $('#react'+post_id).html('<img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('assets/frontend/img/reaction/love.png')}}" alt="reaction-love">');
          }else if(react_id == 3){
            $('#react'+post_id).html('<img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('assets/frontend/img/reaction/angry.png')}}" alt="reaction-angry">');
          }else if(react_id == 4){
            $('#react'+post_id).html('<img class="reaction-image reaction-item-dropdown-trigger" src="{{asset('assets/frontend/img/reaction/sad.png')}}" alt="reaction-sad">');
          }
          

        }
      });
    }else{
      alert('Please Login First');
    }
  }
</script>
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
{{-- <script src="{{asset('assets/frontend/app.bundle.min.js')}}"></script> --}}
