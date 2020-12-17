@extends('layouts.admin_layout')
@section('contents')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Shahcement</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
            <h4 class="page-title">{{$title}}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-layers float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Total Posts</h6>
            <h3 class="my-3" data-plugin="counterup">1,587</h3>
            <span class="badge badge-success mr-1"> +11% </span> <span class="text-muted">From previous period</span>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Active Posts</h6>
            <h3 class="my-3"><span data-plugin="counterup">46,782</span></h3>
            <span class="badge badge-danger mr-1"> -29% </span> <span class="text-muted">From previous period</span>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-chart float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Pending Posts</h6>
            <h3 class="my-3"><span data-plugin="counterup">15</span></h3>
            <span class="badge badge-pink mr-1"> 0% </span> <span class="text-muted">From previous period</span>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-rocket float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Forums</h6>
            <h3 class="my-3" data-plugin="counterup">1,890</h3>
            <span class="badge badge-warning mr-1"> +89% </span> <span class="text-muted">Last year</span>
        </div>
    </div>
</div>
<!-- end row -->
<!--<div class="row">-->
<!--    <div class="col-lg-12 col-xl-12">-->
<!--        <div class="card-box">-->
<!--            <h4 class="header-title mb-3">Posts Statistics</h4>-->

<!--            <div class="text-center">-->
<!--                <ul class="list-inline chart-detail-list mb-0">-->
<!--                    <li class="list-inline-item">-->
<!--                        <h6 class="text-info"><i class="mdi mdi-circle-outline mr-1"></i>Series A</h6>-->
<!--                    </li>-->
<!--                    <li class="list-inline-item">-->
<!--                        <h6 class="text-success"><i class="mdi mdi-triangle-outline mr-1"></i>Series B</h6>-->
<!--                    </li>-->
<!--                    <li class="list-inline-item">-->
<!--                        <h6 class="text-muted"><i class="mdi mdi-square-outline mr-1"></i>Series C</h6>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->

<!--            <div id="morris-bar-stacked" class="morris-chart" style="height: 320px;"></div>-->
<!--        </div>-->
<!--    </div>
<!--</div>-->
<!-- end row -->
<!--<div class="row" style="padding-bottom: 50px;">-->
<!--    <div class="col-xl-12">-->
<!--        <div class="card-box">-->
<!--            <h4 class="header-title mb-3">Monthly Posts</h4>-->
<!--            <div class="table-responsive">-->
<!--                <table class="table table-bordered table-nowrap mb-0">-->
<!--                    <thead>-->
<!--                        <tr>-->
<!--                            <th>Company</th>-->
<!--                            <th>Posted Date</th>-->
<!--                            <th>Accepted Date</th>-->
<!--                            <th>Status</th>-->
<!--                        </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                        <tr>-->
<!--                            <th class="text-muted">Apple Technology</th>-->
<!--                            <td>20/02/2014</td>-->
<!--                            <td>19/02/2020</td>-->
<!--                            <td><span class="badge badge-success">Accept</span></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th class="text-muted">Envato Pty Ltd.</th>-->
<!--                            <td>20/02/2014</td>-->
<!--                            <td>19/02/2020</td>-->
<!--                            <td><span class="badge badge-danger">pending</span></td>-->
<!--                        </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>
<!--</div>-->
<!-- end row -->
@stop
@section('css')
@stop
@section('js')
<!--Morris Chart-->
<script src="{{asset('assets/admin/libs/morris-js/morris.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/raphael/raphael.min.js')}}"></script>

<!-- Dashboard init js-->
<script src="{{asset('assets/admin/js/pages/dashboard.init.js')}}"></script>
@stop