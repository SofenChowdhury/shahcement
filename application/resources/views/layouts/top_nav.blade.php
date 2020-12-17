<style>
    .quick_menue:hover{
        box-shadow: 0px 2px 5px 0px rgb(220 215 215 / 75%);
        transition: .5s;
        padding-bottom: 10px;
    }
    .submenu li{
        border-bottom: 1px dotted lightgray;
    }
</style>
<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 text-white m-0">
                                <span class="float-right">
                                    <a href="#" class="text-white">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>
                        <div class="slimscroll noti-scroll">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success">
                                    <i class="mdi mdi-settings-outline"></i>
                                </div>
                                <p class="notify-details">New settings
                                    <small class="text-muted">There are new settings available</small>
                                </p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-bell-outline"></i>
                                </div>
                                <p class="notify-details">Updates
                                    <small class="text-muted">There are 2 new updates available</small>
                                </p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user
                                    <small class="text-muted">You have 10 unread messages</small>
                                </p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset(Auth::user()->image)}}" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-white m-0">Welcome ! {{Auth::user()->name}}</h6>
                        </div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>
                        <!-- item-->
                        <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout-variant"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{route('dashboard')}}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="http://xobotronix.com/shahcement/uploads/setup/1382688428Nirmane Ami (1).png" alt="" style="height: auto;width: 56px;">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <img src="http://xobotronix.com/shahcement/uploads/setup/1382688428Nirmane Ami (1).png" alt="" style="height: auto;width: 56px;">
                    </span>
                </a>
                <a href="{{route('dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="http://xobotronix.com/shahcement/uploads/setup/1382688428Nirmane Ami (1).png" alt="" style="height: auto;width: 56px;">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <img src="http://xobotronix.com/shahcement/uploads/setup/1382688428Nirmane Ami (1).png" alt="" style="height: auto;width: 56px;">
                    </span>
                </a>
            </div>
        </div> <!-- end container-fluid-->
    </div>
    <!-- end Topbar -->
    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-view-dashboard"></i>Site<div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('index')}}">Website</a></li>
                            <li><a href="{{route('setup_site')}}">Settings</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-black-mesa"></i>Users<div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="{{route('user')}}">User List</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-firebase"></i>Blog<div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="{{route('posts')}}">Posts</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-chemical-weapon"></i>Forums<div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="{{route('admin_forums')}}">Manage Forums</a></li>
                            <li><a href="{{route('forums_members')}}">Forums Members</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-accusoft"></i>Page Contents<div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="{{route('library')}}">E-library</a></li>
                            <li><a href="{{route('con_rule')}}">Construction Rules</a></li>
                            <li><a href="{{route('admin:videos')}}">Videos</a></li>
                            <li><a href="{{route('admin_directory')}}">Directory</a></li>
                            <li><a href="{{route('admin_gallery')}}">Gallery</a></li>
                            
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('admin_messages')}}"> <i class="mdi mdi-charity"></i>Information & Advice</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-accusoft"></i>Location & service Setup<div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="{{route('admin_location')}}">Location</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- End navigation menu -->
                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->
</header>