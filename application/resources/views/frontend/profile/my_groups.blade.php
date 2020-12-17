{{-- <script src="{{asset('assets/frontend/app.bundle.min.js')}}"></script> --}}
@php
  use App\model\forums\JoinBlogForum;
  use App\model\blog\Post;
@endphp
<div class="content-grid"style="margin-top: 7px;margin-bottom: 10px;">

  <div class="grid">
    @foreach($get_forums as $formums)
    @php
      $checkJoin = JoinBlogForum::where('forum_id',$formums->id)
        ->where('user_id',Auth::user()->id)
        ->first();
      $count_members  = JoinBlogForum::where('forum_id',$formums->id)->count();
      $count_posts    = Post::where('status',1)->where('forum_id',$formums->id)->count();
    @endphp
      <div class="user-preview landscape" style="border-radius: 0px;">
          <figure class="user-preview-cover liquid" style="border-radius: 0px;margin-left: 1%;margin-bottom: 10px;">
            <img src="{{asset($formums->cover)}}" alt="cover-08">
          </figure>
          <div class="user-preview-info">
            <div class="user-short-description landscape tiny">
                <a class="user-short-description-avatar user-avatar small no-stats" href="{{route('blog_forums',['id'=>$formums->id])}}">
                  <div class="user-avatar-border">
                      <div class="hexagon-50-56"></div>
                  </div>
                  <div class="user-avatar-content">
                    <div class="hexagon-image-40-44" data-src="{{asset($formums->avatar)}}"></div>
                  </div>
                </a>
                <p class="user-short-description-title"><a href="{{route('blog_forums',['id'=>$formums->id])}}">{{$formums->title}}</a></p>
                <p class="user-short-description-text">{{$formums->note}}</p>
            </div>
            <div class="user-stats">
                <div class="user-stat">
                  <p class="user-stat-title">{{$count_members}}</p>
                  <p class="user-stat-text">members</p>
                </div>
                <div class="user-stat">
                  <p class="user-stat-title">{{$count_posts}}</p>
                  <p class="user-stat-text">posts</p>
                </div>
            </div>
            <div class="user-preview-actions">
                <div class="tag-sticker">
                  @if($formums->type == 0)
                  <svg class="tag-sticker-icon icon-private">
                    <use xlink:href="#svg-private"></use>
                  </svg>
                  @else
                  <svg class="tag-sticker-icon icon-private">
                    <use xlink:href="#svg-public"></use>
                  </svg>
                  @endif
                </div>
                <span id="join_{{$formums->id}}">
                  @if($checkJoin)
                  @if($checkJoin->status == '1')
                  {{-- Approved --}}
                  <p class="button success" onclick="leaveForum({{$formums->id}},{{$formums->type}})" style="background-color:green;"><i class="lni lni-protection"></i></p>
                  @elseif($checkJoin->status == '0')
                  {{-- Pending --}}
                  <p class="button success" onclick="leaveForum({{$formums->id}},{{$formums->type}})" style="background-color:blue;"><i class="lni lni-spinner"></i></p>
                  @else
                  {{-- No Action --}}
                    <p class="button secondary" onclick="joinForum({{$formums->id}},{{$formums->type}})">
                      <svg class="button-icon icon-join-group">
                        <use xlink:href="#svg-join-group"></use>
                      </svg>
                    </p>
                  @endif
                  @else
                  {{-- No Action --}}
                    <p class="button secondary" onclick="joinForum({{$formums->id}},{{$formums->type}})">
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
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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