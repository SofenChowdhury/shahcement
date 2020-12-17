<!-- Sweet Alert -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
<div class="grid grid-3-6-3">
    <!-- GRID COLUMN -->
    <div class="grid-column">
      <div class="widget-box">
        <p class="widget-box-title">About Me</p>
        <div class="widget-box-content" style="margin-top: 9px;">
          <p class="paragraph">
            <textarea class="form-control" name="about_me" placeholder="About Me" id="about_me"></textarea>
          </p>
          <div class="information-line-list">

            <div class="information-line">
              	<p class="information-line-title">City</p>
              	<p class="information-line-text" style="width: 100%">
	              	<select class="form-control" name="city" id="city">
	              		<option value="">Select City</option>
	              		<option value="Dhaka">Dhaka</option>
	              		<option value="Comilla">Comilla</option>
	              	</select>
              	</p>
            </div>
            <div class="information-line">
              	<p class="information-line-title">Country</p>
              	<p class="information-line-text" style="width: 100%">
              		<select class="form-control" name="country" id="country">
	              		<option value="">Select City</option>
	              		<option value="Bangladesh">Bangladesh</option>
	              		<option value="India">India</option>
	              	</select>
              	</p>
            </div>
            <div class="information-line">
              	<p class="information-line-title">Web</p>
              	<p class="information-line-text">
              		<input type="text" name="website" class="form-control" style="height: 30px;" placeholder="Website Link" id="website">
              	</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-column">
      <div class="widget-box">
        <p class="widget-box-title">Personal Info</p>
        <div class="widget-box-content">
          <div class="information-line-list">
            <div class="information-line">
              <p class="information-line-title">Email</p>
              <p class="information-line-text">{{Auth::user()->email}}</p>
            </div>
            <div class="information-line">
              <p class="information-line-title">Birthday</p>
              <p class="information-line-text">
                <input type="date" name="Birthday" style="border:1px solid lightgray;" id="birthday">
              </p>
            </div>
            <div class="information-line">
              <p class="information-line-title">Occupation</p>
              <p class="information-line-text">
                <input type="text" name="occupation" style="border:1px solid lightgray;height: 30px;" id="occupation">
              </p>
            </div>
            <p class="btn btn-success" style="float: right;" onclick="submitUserInfo()"> <i class="lni lni-database"></i> Save Data</p>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-column">
      <div class="widget-box">
        <p class="widget-box-title">My Joined Forums</p>
        <div class="widget-box-content">
          <div class="stat-block-list">
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
          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
  function submitUserInfo(){
    var about_me  = $('#about_me').val();
    var city      = $('#city option:selected').val();
    var country   = $('#country option:selected').val();
    var website   = $('#website').val();
    var birthday  = $('#birthday').val();
    var occupation= $('#occupation').val();
    var status    = $('#status option:selected').val();
    var cover     = $('#cover_img').val();

    $.ajax({
        url: "{{ url('submitUserInfo') }}",
        method: 'get',
        data:{'about_me'  : about_me,
              'city'      : city,
              'country'   : country,
              'website'   : website,
              'birthday'  : birthday,
              'occupation': occupation,
              'status'    : status,
              'cover'     : cover,
            },
        success: function(data) {
          Swal.fire(
              'Thank You!!',
              'Your Data has been Updated.',
              'success'
            )
        }
    });
  }
</script>