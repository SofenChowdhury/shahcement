@extends('layouts.frontend_layout')
@section('contents')
{{-- <script src="{{asset('assets/frontend/app.bundle.min.js')}}"></script> --}}

<div class="content-grid"style="padding-left:10%;margin-bottom: 10px;padding-top:5% !important;">

   <h4 style="margin: 10px;padding: 20px 10px 0px 10px;text-align: center;">{{$post_forum->title}}</h4>

    <div class="section-filters-bar v2">

        <form class="form" method="GET" action="{{ route('searchPost') }}" enctype="multipart/form-data">
          @csrf()
          <div class="form-item split medium">
            <div class="form-select" style="width: 100%;">
              <input type="text" name="title" class="form-control" placeholder="search Forum with Title ...">
              <input type="hidden" name="id" class="form-control" placeholder="search Forum with Title ..." value="{{$post_forum->id}}">
            </div>
            <button type="submit" class="button secondary">Search Forum</button>
          </div>
        </form>
    </div>
  <div class="grid">
      <div class="user-preview " style="border-radius: 0px;background-color: white;padding: 0px 10px 10px 10px;">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
               Post title 
              </th>
              <th>
                Post date
              </th>
              <th>
                Posted by
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($blog_post as $post)
            <tr>
              <td>
                <h6><a href="{{route('get_post_data',['id'=>$post->id])}}">{{$post->post_title}}</a></h6>
                <p>{{$post->post_sub_title}}</p>
              </td>
              <td>
                {{$post->updated_at}}
              </td>
              <td>
                {{$post->name}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$blog_post->links()}}
      </div>
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
@stop