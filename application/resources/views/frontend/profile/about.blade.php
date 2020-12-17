{{-- <script src="{{asset('assets/frontend/app.bundle.min.js')}}"></script> --}}
<div class="grid grid-3-6-3">
  <!-- GRID COLUMN -->
  <div class="grid-column">
    <div class="widget-box">
      <p class="widget-box-title">About Me</p>
      <div class="widget-box-content">
        <p class="paragraph">{!! $user_info->about_me !!}</p>
        <div class="information-line-list">
          <div class="information-line">
            <p class="information-line-title">Joined</p>
            <p class="information-line-text">{{date('dM Y', strtotime( $user_info->updated_at ))}}</p>
          </div>
          <div class="information-line">
            <p class="information-line-title">City</p>
            <p class="information-line-text">{{$user_info->city}}, {{$user_info->country}}</p>
          </div>
          @php

            $date1=date_create($user_info->birth_date);
            $date2=date_create(date('Y-m-d'));
            $diff=date_diff($date1,$date2);

          @endphp
          <div class="information-line">
            <p class="information-line-title">Age</p>
            <p class="information-line-text">+{{$diff->format("%Y")}} Years</p>
          </div>
          <div class="information-line">
            <p class="information-line-title">Web</p>
            <p class="information-line-text"><a href="#">{{$user_info->website}}</a></p>
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
            <p class="information-line-title">Role</p>
            <p class="information-line-text">{{Auth::user()->role}}</p>
          </div>
          <div class="information-line">
            <p class="information-line-title">Birthday</p>
            <p class="information-line-text">{{date('d M, Y',strtotime($user_info->birth_date))}}</p>
          </div>
          <div class="information-line">
            <p class="information-line-title">Occupation</p>
            <p class="information-line-text">{{$user_info->occupation}}</p>
          </div>
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