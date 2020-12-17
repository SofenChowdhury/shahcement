@php
    use App\model\SetupSite;
    $get_site_settings = SetupSite::first();
  @endphp
<style>
    @import url('https://fonts.maateen.me/solaiman-lipi/font.css');
    .displayNone{
        display: none;
    }
</style>
<!-- HEADER -->
  <header class="header" id="widths" onresize="widthSIze()">
    <div class="header-actions">
      <div class="header-brand">
        <div class="logo" style="width: 100px;" id="logo">
          <img class="" src="{{asset($get_site_settings->logo)}}" style="width: 100%;display: block !important;">
        </div>
        <div class="colups" style="width: 100px;margin-left: 5%;cursor:pointer;" id="colups">
            <div class="navigation-widget-mobile-trigger">
                <svg class="icon-grid">
                  <use xlink:href="#svg-grid"></use>
                </svg>
            </div>
            <!--<div class="mobilemenu-trigger navigation-widget-mobile-trigger">-->
            <!--    <div class="burger-icon inverted">-->
            <!--      <div class="burger-icon-bar"></div>-->
            <!--      <div class="burger-icon-bar"></div>-->
            <!--      <div class="burger-icon-bar"></div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <div style="width:200px;" id="logo_text">
            <span><img class="" src="{{asset($get_site_settings->logo)}}" style="width: 66px;display: block !important;float:right;"></span>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            var displayWidth = $(window).width();
    
            if(displayWidth > 1000){
                $('#colups').hide();
                $('#logo_text').hide();
                $('#logo').show();
            }else{
                $('#logo').hide();
                $('#colups').show();
                $('#logo_text').show();
            }
            function widthSIze() {
                var displayWidth = window.outerWidth;
    
                if(displayWidth > 1000){
                    $('#colups').hide();
                    $('#logo_text').hide();
                    $('#logo').show();
                }else{
                    $('#logo').hide();
                    $('#colups').show();
                    $('#logo_text').show();
                }
            }
        </script>
        
      </div>
    </div>
    <div class="header-actions" style="width:100%;">
      <!-- <div class="sidemenu-trigger navigation-widget-trigger">
        <svg class="icon-grid">
          <use xlink:href="#svg-grid"></use>
        </svg>
        </div>
        <div class="navigation-widget-mobile-trigger">
            <div class="burger-icon inverted">
              <div class="burger-icon-bar"></div>
              <div class="burger-icon-bar"></div>
              <div class="burger-icon-bar"></div>
            </div>
        </div> -->
      <nav class="navigation">
        <ul class="menu-main" style="font-family: 'SolaimanLipi', sans-serif;padding-left: 20px;">
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('index')}}" style="font-family: SolaimanLipi;font-size: 14px;">হোম </a>
          </li>
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('forums')}}"style="font-family: SolaimanLipi;font-size: 14px;">ফোরাম</a>
          </li>
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('construction_rule')}}"style="font-family: SolaimanLipi;font-size: 14px;">নির্মাণ নিয়মাবলী</a>
          </li>
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('frontend:videos')}}"style="font-family: SolaimanLipi;font-size: 14px;">নির্মাণ  ভিডিও</a>
          </li>
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('e_book')}}"style="font-family: SolaimanLipi;font-size: 14px;">লাইব্রেরি</a>
          </li>
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('directory')}}"style="font-family: SolaimanLipi;font-size: 14px;">ডিরেক্টরি</a>
          </li>
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('gallery')}}"style="font-family: SolaimanLipi;font-size: 14px;">গ্যালারী</a>
          </li>
          
          <li class="menu-main-item">
            <a class="menu-main-item-link" href="{{route('info_advice')}}"style="font-family: SolaimanLipi;font-size: 14px;">তথ্য ও পরামর্শ</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header-actions">
      <div class="action-list dark">
        <div class="action-list-item-wrap">
          <div class="action-list-item unread header-dropdown-trigger">
            <i class="lni lni-facebook-messenger" style="color:white;"></i>
          </div>
          @php
            use App\model\RepliedMessage;
            $get_replied_msg = RepliedMessage::leftjoin('messages','messages.id','replied_messages.message_id')
              ->leftjoin('users','users.id','replied_messages.replied_by')
              ->select('messages.title','users.name','users.image','replied_messages.*')
              ->where('replied_to',Auth::user()->id)
              ->orderby('id','DESC')
              ->limit(10)
              ->get();
          @endphp
          <div class="dropdown-box header-dropdown">
            <div class="dropdown-box-header" style="border-bottom: 1px solid #dbdbdb;">
              <p class="dropdown-box-header-title">Messages</p>
            </div>
            <div class="dropdown-box-list" data-simplebar>
              @foreach($get_replied_msg as $replied)
              <div class="dropdown-box-list-item unread">
                <div class="user-status notification">
                  <a class="user-status-avatar" href="{{route('view_message',$replied->message_id)}}">
                    <div class="user-avatar small no-outline">
                      <div class="user-avatar-content">
                        <div class="hexagon-image-30-32" data-src="{{asset($replied->image)}}"></div>
                      </div>
                    </div>
                  </a>
                  <p class="user-status-title"><a class="bold" href="{{route('view_message',$replied->message_id)}}">{{$replied->name}}</a> sent a Message for your <a class="highlighted" href="{{route('view_message',$replied->message_id)}}">{{$replied->title}}</a></p>
                  <p class="user-status-timestamp">{{ \Carbon\Carbon::parse($replied->updated_at)->diffForhumans() }}</p>
                  <div class="user-status-icon">
                    <svg class="icon-comment">
                      <use xlink:href="#svg-comment"></use>
                    </svg>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <a class="dropdown-box-button secondary" href="{{route('all_message')}}">View all Messages</a>
          </div>
        </div>
      </div>
      <div class="action-item-wrap">
        <div class="action-item dark header-settings-dropdown-trigger">
          <svg class="action-item-icon icon-settings">
            <use xlink:href="#svg-settings"></use>
          </svg>
        </div>
        <div class="dropdown-navigation header-settings-dropdown">
          <div class="dropdown-navigation-header">
            <div class="user-status">
              <a class="user-status-avatar" href="{{route('profile')}}">
                <div class="user-avatar small no-outline">
                  <div class="user-avatar-content">
                    <div class="hexagon-image-30-32" data-src="{{asset(Auth::user()->image)}}"></div>
                  </div>
                  <div class="user-avatar-progress">
                    <div class="hexagon-progress-40-44"></div>
                  </div>
                  <div class="user-avatar-progress-border">
                    <div class="hexagon-border-40-44"></div>
                  </div>
                  <div class="user-avatar-badge">
                    <div class="user-avatar-badge-border">
                      <div class="hexagon-22-24"></div>
                    </div>
                    <div class="user-avatar-badge-content">
                      <div class="hexagon-dark-16-18"></div>
                    </div>
                  </div>
                </div>
              </a>
              <p class="user-status-title"><span class="bold">Hi {{Auth()->user()->name}}!</span></p>
              <p class="user-status-text small"><a href="{{route('profile')}}">{{Auth()->user()->email}}</a></p>
            </div>
          </div>
          <p class="dropdown-navigation-category">My Profile</p>
          @if(Auth::user()->role=='Admin')
          <a class="dropdown-navigation-link" href="{{route('dashboard')}}">Dashboard</a>
          @endif
          <a class="dropdown-navigation-link" href="{{route('profile')}}">Profile Info</a>
          <a class="dropdown-navigation-link" href="{{route('all_message')}}">Messages</a>
          <a class="dropdown-navigation-link" href="{{route('change_password')}}">Change Password</a>
          <a class="dropdown-navigation-button button small secondary" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </header>