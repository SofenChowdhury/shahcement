<div class="quick-post">
  <div class="quick-post-header">
    <div class="option-items">
      <div class="option-item blog"  onClick="BlogPost('1')">
        <svg class="option-item-icon icon-status">
          <use xlink:href="#svg-status"></use>
        </svg>
        <p class="option-item-title">Blog Post</p>
      </div>
      <!--<div class="option-item poll"  onClick="BlogPost('2')">-->
      <!--  <svg class="option-item-icon icon-poll">-->
      <!--    <use xlink:href="#svg-poll"></use>-->
      <!--  </svg>-->
      <!--  <p class="option-item-title">Poll</p>-->
      <!--</div>-->
    </div>
  </div>
  <div class="quick-post-body">
    <!-- FORM -->
    <form class="form"  method="POST" action="{{ route('savePost') }}" enctype="multipart/form-data">
      @csrf()
      <!-- FORM ROW -->
      <div class="form-row">


        <!-- FORM ITEM -->
        <div class="form-item" id="blog_input">
          <div class="row">
            <input type="text" name="title" class="form-control" placeholder="insert Title" style="border-radius: 0px;height: 35px;border-bottom: 1px solid lightgray;border-top: 0px solid lightgray;border-right: 0px solid lightgray;border-left: 0px solid lightgray;width: 50%;">
            {{-- <input type="text" name="sub_title" class="form-control" placeholder="insert Sub-Title" style="border-radius: 0px;height: 35px;border: 0px solid lightgray;"> --}}
            @if(!$post_forum)
            <select class="form-control" name="forum_id" style="border-radius: 0px;height: 35px;border: 0px solid lightgray;width: 50%" required="">
              <option value="">Select Forum</option>
              @foreach($get_forum as $forum)
              <option value="{{$forum->id}}">{{$forum->title}}</option>
              @endforeach
            </select>
            @else
            <select class="form-control" name="forum_id" style="border-radius: 0px;height: 35px;border: 0px solid lightgray;width: 50%" required="">
              <option value="{{$post_forum->id}}">{{$post_forum->title}}</option>
            </select>
            @endif
          </div>
          <input type="hidden" name="post_type" class="form-control" id="post_type" placeholder="insert Sub-Title" style="border-radius: 0px;height: 35px;border: 0px solid lightgray;">
          <div id="description">
            <!-- FORM TEXTAREA -->
            <div class="form-textarea">
              <textarea name="description" id="editor" placeholder="Hi @if(Auth::user()){{Auth::user()->name}}@else Guest @endif! Share your post here..."></textarea>
            </div>
            <!-- /FORM TEXTAREA -->
            <img src="" style="height: 30px;" id="blah0">
            <img src="" style="height: 30px;" id="blah1">
            <img src="" style="height: 30px;" id="blah2">
            <img src="" style="height: 30px;" id="blah3">
            <img src="" style="height: 30px;" id="blah4">
            <img src="" style="height: 30px;" id="blah5">
            <input type="file" name="image[]" id="imgupload" onchange="
              document.getElementById('blah0').src = window.URL.createObjectURL(this.files[0]),
              document.getElementById('blah1').src = window.URL.createObjectURL(this.files[1]),
              document.getElementById('blah2').src = window.URL.createObjectURL(this.files[2]),
              document.getElementById('blah3').src = window.URL.createObjectURL(this.files[3]),
              document.getElementById('blah4').src = window.URL.createObjectURL(this.files[4]),
              document.getElementById('blah5').src = window.URL.createObjectURL(this.files[5])
              " style="display: none;" multiple/> 
          </div>
          <div id="poll_question" style="margin-top: 20px;margin-bottom: 20px;margin-left: 10%;margin-right: 10%;">
            <input type="text" name="qustion[]" class="form-control" placeholder="insert Qustion" style="border-radius: 0px;height: 35px;">
            <input type="text" name="qustion[]" class="form-control" placeholder="insert Qustion" style="border-radius: 0px;height: 35px;">
            <input type="text" name="qustion[]" class="form-control" placeholder="insert Qustion" style="border-radius: 0px;height: 35px;">
            <input type="text" name="qustion[]" class="form-control" placeholder="insert Qustion" style="border-radius: 0px;height: 35px;">
            <div id="add_question">
               
            </div>
          </div>
        </div>
        <!-- /FORM ITEM -->
        <input type="submit" id="submit" style="display: none;">

      </div>
      <!-- /FORM ROW -->
    </form>
    <!-- /FORM -->
  </div>
  <div class="quick-post-footer">
    <!-- QUICK POST FOOTER ACTIONS -->
    <div class="quick-post-footer-actions">
      <!-- QUICK POST FOOTER ACTION -->
      <div class="quick-post-footer-action text-tooltip-tft-medium" data-title="Insert Photo" id="OpenImgUpload">
        <!-- QUICK POST FOOTER ACTION ICON -->
        <div id="camera">
          <svg class="quick-post-footer-action-icon icon-camera">
            <use xlink:href="#svg-camera"></use>
          </svg>
          <small style="color: lightgray;">Insert Image here !</small>
          <!-- /QUICK POST FOOTER ACTION ICON -->
        </div>
      </div>
      <!-- /QUICK POST FOOTER ACTION -->
    </div>
    <!-- /QUICK POST FOOTER ACTIONS -->
    <!-- QUICK POST FOOTER ACTIONS -->
    <div class="quick-post-footer-actions" style="float: right;">
      <!-- BUTTON -->
      <!--<p class="button small void">Discard</p>-->
      <!-- /BUTTON -->
      <p class="button small danger" id="add_poll"><i class="fa fa-plus"></i> add Poll</p>
      <!-- BUTTON -->
      <p class="button small secondary" id="submit_post">Post</p>
      <!-- /BUTTON -->
    </div>
    <!-- /QUICK POST FOOTER ACTIONS -->
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'editor',{
    filebrowserBrowseUrl: "{{route('ckeditor.browsImage')}}",
    filebrowserUploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
<script>
$('.blog').addClass('active');
$('#post_type').val('1');
$('#OpenImgUpload').click(function(){ 
  $('#imgupload').trigger('click');
});
$('#submit_post').click(function(){ 
  $('#submit').trigger('click');
});
  $('#poll_question').hide();
  $('#add_poll').hide();
  function BlogPost($id){
    $('#post_type').val($id);
    if ($id == '1') {
      $('.blog').addClass('active');
      $('.poll').removeClass('active');
      $('#description').show();
      $('#camera').show();
      $('#poll_question').hide();
      $('#add_poll').hide();
    }else{
      $('.poll').addClass('active');
      $('.blog').removeClass('active');
      $('#description').hide();
      $('#camera').hide();
      $('#poll_question').show();
      $('#add_poll').show();
    }
  }
  $('#add_poll').click(function(){
    $('#add_question').append('<input type="text" name="qustion[]" class="form-control" placeholder="insert Qustion" style="border-radius: 0px;height: 35px;">');
  });
</script>