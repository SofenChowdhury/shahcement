<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/bootstrap.min.css')}}">
  <!-- styles -->
  <link rel="stylesheet" href="{{asset('assets/frontend/css/styles.min.css')}}">
  <!-- simplebar styles -->
  <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/simplebar.css')}}">
  <!-- tiny-slider styles -->
  <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/tiny-slider.css')}}">
  <!-- favicon -->
  <link rel="icon" href="{{asset('assets/frontend/img/favicon.ico')}}">
  <link rel="icon" href="https://shahcement.com/wp-content/uploads/2017/11/logo2.png">
  <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
  <title>Nirmaney ami Blog | Newsfeed</title>
  <style>
    @media screen and (max-width: 1365px){
      .header .header-actions .navigation {
        display: contents !important;
      }
    }
    @media screen and (max-width: 680px){
      
      .header .header-actions .sidemenu-trigger {
          display: contents !important;
      }
    }
  </style>
</head>
<body onresize="widthSIze()">
  @php
    use App\model\SetupSite;
    $get_site_settings = SetupSite::first();
  @endphp
  <!--@include('layouts.sidebar-left')-->

  @include('layouts.topbar')

  <aside class="floaty-bar">
    <div class="bar-actions">
      <div class="action-list dark">
        <a class="action-list-item" href="#">
          <svg class="action-list-item-icon icon-messages">
            <use xlink:href="#svg-messages"></use>
          </svg>
        </a>
        <a class="action-list-item unread" href="#">
          <svg class="action-list-item-icon icon-notification">
            <use xlink:href="#svg-notification"></use>
          </svg>
        </a>
      </div>
      <a class="action-item-wrap" href="#">
        <div class="action-item dark">
          <svg class="action-item-icon icon-settings">
            <use xlink:href="#svg-settings"></use>
          </svg>
        </div>
      </a>
    </div>
    <div class="@media screen and (max-width: 680px)">
        <img src="http://xobotronix.com/shahcement/uploads/gallery/shah.png" style="width:100%;padding-bottom:7%;">
      
    </div>
  </aside>

  @yield('contents')

<!-- app -->
<script src="{{asset('assets/frontend/app.bundle.min.js')}}"></script>
</body>
</html>