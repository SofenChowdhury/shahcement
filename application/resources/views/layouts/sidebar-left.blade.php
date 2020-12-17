<!-- NAVIGATION WIDGET -->
<style>
  .menu-item-link:hover i{
    color: tomato !important;
    
  }
  @import url('https://fonts.maateen.me/solaiman-lipi/font.css');
</style>
<nav id="navigation-widget-small" class="navigation-widget navigation-widget-desktop closed sidebar left delayed main-navigation-desktop" style="width: 8%;overflow-y:scroll;">
  <a class="user-avatar small no-outline online" href="{{route('profile')}}">
    <div class="user-avatar-content">
      @if(Auth::user())
      <div class="hexagon-image-30-32" data-src="{{asset(Auth::user()->image)}}"></div>
      @else
      <div class="hexagon-image-30-32" data-src="{{asset('assets/frontend/img/avatar/01.jpg')}}"></div>
      @endif
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
      <p class="user-avatar-badge-text">24</p>
    </div>
  </a>
  <ul class="menu small">
    <li class="menu-item {{ Request::routeIs('index') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('index')}} "style="font-family: SolaimanLipi;" data-title="নির্মাণে আমি ক্লাব">
        <svg class="menu-item-link-icon icon-newsfeed">
          <use xlink:href="#svg-newsfeed"></use>
        </svg>
      </a>
        <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;"> হোম </p>
    </li>
    <li class="menu-item {{ Request::routeIs('forums') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('forums')}}"style="font-family: SolaimanLipi;" data-title="ফোরাম আলোচনা">
        <svg class="menu-item-link-icon icon-group">
          <use xlink:href="#svg-group"></use>
        </svg>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;">ফোরাম</p>
    </li>
    <li class="menu-item {{ Request::routeIs('construction_rule') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('construction_rule')}}" data-title="নির্মাণ নিয়মাবলী">
        <i class="menu-item-link-icon lni lni-target" style="font-size: 22px;color: #acaeca;"></i>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;"> নির্মাণ নিয়মাবলী </p>
    </li>
    <li class="menu-item {{ Request::routeIs('frontend:videos') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('frontend:videos')}}" data-title="নির্মাণে আমি ভিডিও">
        <i class="menu-item-link-icon lni lni-video" style="font-size: 22px;color: #acaeca;"></i>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;"> নির্মাণে আমি ভিডিও </p>
    </li>
    <li class="menu-item {{ Request::routeIs('e_book') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('e_book')}}" data-title="ই-লাইব্রেরি">
        <i class="menu-item-link-icon lni lni-book" style="font-size: 22px;color: #acaeca;"></i>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;">লাইব্রেরি</p>
    </li>
    <li class="menu-item {{ Request::routeIs('directory') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('directory')}}" data-title="ডিরেক্টরি">
        <i class="menu-item-link-icon lni lni-users" style="font-size: 22px;color: #acaeca;"></i>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;">ডিরেক্টরি</p>
    </li>
    <li class="menu-item {{ Request::routeIs('gallery') ? 'active' : '' }}">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('gallery')}}" data-title="গ্যালারী">
        <i class="menu-item-link-icon lni lni-gallery" style="font-size: 22px;color: #acaeca;"></i>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;"> গ্যালারী </p>
    </li>
    <li class="menu-item {{ Request::routeIs('info_advice') ? 'active' : '' }}" style="margin-bottom:30px;">
      <a class="menu-item-link text-tooltip-tfr" href="{{route('info_advice')}}" data-title="তথ্য ও পরামর্শ">
        <i class="menu-item-link-icon lni lni-direction-alt" style="font-size: 22px;color: #acaeca;"></i>
      </a>
      <p style="font-family: 'SolaimanLipi', sans-serif;font-size: 14px;font-weight: bold;text-align: center;padding-top:10px;">তথ্য ও পরামর্শ</p>
    </li>
  </ul>
</nav>
<nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left hidden navigation-desktop" data-simplebar>
  <figure class="navigation-widget-cover liquid">
    <img src="{{asset('assets/frontend/img/cover/01.jpg')}}" alt="cover-01">
  </figure>
  <div class="user-short-description">
    <a class="user-short-description-avatar user-avatar medium" href="{{route('profile')}}">
      <div class="user-avatar-border">
        <div class="hexagon-120-132"></div>
      </div>
      <div class="user-avatar-content">
        <div class="hexagon-image-82-90" data-src="{{asset(Auth::user()->image)}}"></div>
      </div>
      <div class="user-avatar-progress">
        <div class="hexagon-progress-100-110"></div>
      </div>
      <div class="user-avatar-progress-border">
        <div class="hexagon-border-100-110"></div>
      </div>
      <div class="user-avatar-badge">
        <div class="user-avatar-badge-border">
          <div class="hexagon-32-36"></div>
        </div>
        <div class="user-avatar-badge-content">
          <div class="hexagon-dark-26-28"></div>
        </div>
        <p class="user-avatar-badge-text">24</p>
      </div>
    </a>
    <p class="user-short-description-title"><a href="{{route('profile')}}">{{Auth::user()->name}}</a></p>
    <p class="user-short-description-text"><a href="#">{{Auth::user()->email}}</a></p>
  </div>
  <ul class="menu">
    <li class="menu-item {{ Request::routeIs('index') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('index')}}">
        <svg class="menu-item-link-icon icon-newsfeed">
          <use xlink:href="#svg-newsfeed"></use>
        </svg>
        হোম
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('forums') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('forums')}}">
        <svg class="menu-item-link-icon icon-group">
          <use xlink:href="#svg-group"></use>
        </svg>
        ফোরাম
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('construction_rule') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('construction_rule')}}">
        <i class="menu-item-link-icon lni lni-target" style="font-size: 22px;color: #acaeca;"></i>
        নির্মাণ নিয়মাবলী
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('frontend:videos') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('frontend:videos')}}">
        <i class="menu-item-link-icon lni lni-video" style="font-size: 22px;color: #acaeca;"></i>
        নির্মাণে আমি ভিডিও
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('e_book') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('e_book')}}">
        <i class=" menu-item-link-icon lni lni-book" style="font-size: 22px;color: #acaeca;"></i>
        লাইব্রেরি
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('directory') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('directory')}}">
        <i class=" menu-item-link-icon lni lni-users" style="font-size: 22px;color: #acaeca;"></i>
        ডিরেক্টরি
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('gallery') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('gallery')}}">
        <i class="menu-item-link-icon lni lni-gallery" style="font-size: 22px;color: #acaeca;"></i>
        গ্যালারী
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('info_advice') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('info_advice')}}">
        <i class="menu-item-link-icon lni lni-direction-alt" style="font-size: 22px;color: #acaeca;"></i>
        তথ্য ও পরামর্শ
      </a>
    </li>
  </ul>
</nav>
<nav id="navigation-widget-mobile" class="navigation-widget navigation-widget-mobile sidebar left hidden" data-simplebar>
  <div class="navigation-widget-close-button">
    <svg class="navigation-widget-close-button-icon icon-back-arrow">
      <use xlink:href="#svg-back-arrow"></use>
    </svg>
  </div>
  <div class="navigation-widget-info-wrap">
    <div class="navigation-widget-info">
      <a class="user-avatar small no-outline" href="{{route('profile')}}">
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
          <p class="user-avatar-badge-text"></p>
        </div>
      </a>
      <p class="navigation-widget-info-title"><a href="{{route('profile')}}">{{Auth::user()->name}}</a></p>
      <p class="navigation-widget-info-text">Welcome Back!</p>
    </div>
    <a class="navigation-widget-info-button button small secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
  <ul class="menu">
    <li class="menu-item {{ Request::routeIs('index') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('index')}}">
        <svg class="menu-item-link-icon icon-newsfeed">
          <use xlink:href="#svg-newsfeed"></use>
        </svg>
        হোম
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('forums') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('forums')}}">
        <svg class="menu-item-link-icon icon-group">
          <use xlink:href="#svg-group"></use>
        </svg>
        ফোরাম
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('construction_rule') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('construction_rule')}}">
        <i class="menu-item-link-icon lni lni-target" style="font-size: 22px;color: #acaeca;"></i>
        নির্মাণ নিয়মাবলী 
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('frontend:videos') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('frontend:videos')}}">
        <i class="menu-item-link-icon lni lni-video" style="font-size: 22px;color: #acaeca;"></i>
        নির্মাণে আমি ভিডিও
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('e_book') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('e_book')}}">
        <i class="menu-item-link-icon lni lni-book" style="font-size: 22px;color: #acaeca;"></i>
        লাইব্রেরি
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('directory') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('directory')}}">
        <i class="menu-item-link-icon lni lni-users" style="font-size: 22px;color: #acaeca;"></i>
        ডিরেক্টরি 
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('gallery') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('gallery')}}">
        <i class="menu-item-link-icon lni lni-gallery" style="font-size: 22px;color: #acaeca;"></i>
        গ্যালারী 
      </a>
    </li>
    <li class="menu-item {{ Request::routeIs('info_advice') ? 'active' : '' }}">
      <a class="menu-item-link" href="{{route('info_advice')}}">
        <i class="menu-item-link-icon lni lni-direction-alt" style="font-size: 22px;color: #acaeca;"></i>
        তথ্য ও পরামর্শ
      </a>
    </li>
  </ul>
  <!-- /MENU -->
  <p class="navigation-widget-section-title">My Profile</p>
  <a class="navigation-widget-section-link" href="{{route('profile')}}">Profile Info</a>
  <a class="navigation-widget-section-link" href="#">Notifications</a>
  <a class="navigation-widget-section-link" href="{{route('change_password')}}">Change Password</a>
</nav>
<!-- /NAVIGATION WIDGET -->