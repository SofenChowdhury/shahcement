@extends('layouts.frontend_layout')
@section('contents')
@php
  use App\model\forums\JoinBlogForum;
@endphp
@php
    use App\model\SetupSite;
    $get_site_settings = SetupSite::first();
  @endphp
  <div class="page-loader">
    <!-- PAGE LOADER DECORATION -->
    <div class="page-loader-decoration">
      <!-- ICON LOGO -->
      <img class="icon-logo" src="{{asset($get_site_settings->pg_loder)}}" style="width: 250%;height: 150%;">
      <!-- /ICON LOGO -->
    </div>
    <!-- /PAGE LOADER DECORATION -->

    <!-- PAGE LOADER INFO -->
    <div class="page-loader-info">
      <!-- PAGE LOADER INFO TITLE -->
      <p class="page-loader-info-title">Nirmaney ami Forum</p>
      <!-- /PAGE LOADER INFO TITLE -->

      <!-- PAGE LOADER INFO TEXT -->
      <p class="page-loader-info-text">Loading...</p>
      <!-- /PAGE LOADER INFO TEXT -->
    </div>
    <!-- /PAGE LOADER INFO -->
    
    <!-- PAGE LOADER INDICATOR -->
    <div class="page-loader-indicator loader-bars">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
    </div>
    <!-- /PAGE LOADER INDICATOR -->
  </div>
  <!-- /PAGE LOADER -->
<!-- CONTENT GRID -->
  <div class="content-grid">
    <div class="grid grid-3-6-3 mobile-prefer-content" style="padding-top: 7%;">
      <div class="grid-column">
        <div class="widget-box">
          <div class="progress-arc-summary">
            <div class="progress-arc-wrap">
              <div class="progress-arc">
                <canvas id="profile-completion-chart"></canvas>
              </div>
        
              <!-- PROGRESS ARC INFO -->
              <div class="progress-arc-info">
                <!-- PROGRESS ARC TITLE -->
                <p class="progress-arc-title" style="overflow: hidden;">
                  <img src="{{asset(Auth::user()->image)}}" style="width: 100%;border-radius: 100px;">
                </p>
                <!-- /PROGRESS ARC TITLE -->
              </div>
              <!-- /PROGRESS ARC INFO -->
            </div>
            <!-- /PROGRESS ARC WRAP -->
        
            <!-- PROGRESS ARC SUMMARY INFO -->
            <div class="progress-arc-summary-info">
              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-title">{{Auth::user()->name}}</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->
        
              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-subtitle">{{Auth::user()->role}}</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->
            </div>
            <!-- /PROGRESS ARC SUMMARY INFO -->
          </div>
          <!-- /PROGRESS ARC SUMMARY -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        @include('frontend.includes.posts')
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">      
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">ফোরাম</p>
          <!-- /WIDGET BOX TITLE -->
          
          
          
          
        @foreach($get_forum as $formums)
            @php
              $checkJoin = JoinBlogForum::where('forum_id',$formums->id)
                ->where('user_id',Auth::user()->id)
                ->first();
            @endphp
              <div class="user-preview landscape" style="border-radius: 0px;margin-bottom: 10px;padding-left:0px;">
                  
                  <img src="{{asset($formums->avatar)}}" alt="cover-08" style="width: 30px;">
                  <div class="user-preview-info">
                    <div class="user-short-description landscape tiny" style="width: 50%;">
                        <p class="user-short-description-title">
                          <a href="{{route('blog_forums',['id'=>$formums->id])}}">{{$formums->title}}</a>
                        </p>
                    </div>
                    <div class="user-preview-actions">
                        <span id="join_{{$formums->id}}">
                          @if($checkJoin)
                          @if($checkJoin->status == '1')
                          {{-- Approved --}}
                          <p class="button success" onclick="leaveForum({{$formums->id}},{{$formums->type}})" style="background-color:green; width:40px;height:40px;">
                              <i class="lni lni-protection"></i>
                              </p>
                          @elseif($checkJoin->status == '0')
                          {{-- Pending --}}
                          <p class="button success" onclick="leaveForum({{$formums->id}},{{$formums->type}})" style="background-color:blue; width:40px;height:40px;"><i class="lni lni-spinner"></i></p>
                          @else
                          {{-- No Action --}}
                            <p class="button secondary" onclick="joinForum({{$formums->id}},{{$formums->type}})"  style="width:40px; height:40px;">
                              <svg class="button-icon icon-join-group">
                                <use xlink:href="#svg-join-group"></use>
                              </svg>
                            </p>
                          @endif
                          @else
                          {{-- No Action --}}
                            <p class="button secondary" onclick="joinForum({{$formums->id}},{{$formums->type}})" style="width:40px; height:40px;">
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
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
  </div>
  <!-- /CONTENT GRID -->
@stop