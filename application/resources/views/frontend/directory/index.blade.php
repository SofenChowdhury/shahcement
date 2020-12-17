@extends('layouts.frontend_layout')
@section('contents')
<style type="text/css">

    .banner .med-caption {
        font-size: 2.5em
    }

    .box-title {
        margin-bottom: 0;
        line-height: 1em
    }

    .box-title small {
        font-size: 10px;
        color: #838383;
        text-transform: uppercase;
        display: block;
        margin-top: 4px
    }

    button,
    input[type="button"].button,
    a.button {
        border: none;
        color: #fff;
        cursor: pointer;
        padding: 0 15px;
        white-space: nowrap
    }

    button.btn-small,
    input[type="button"].button.btn-small,
    a.button.btn-small {
        height: 28px;
        padding: 0 24px;
        line-height: 28px;
        font-size: 0.9167em
    }

    a.button {
        display: inline-block;
        background: #d9d9d9;
        font-size: 0.8333em;
        line-height: 1.8333em;
        white-space: nowrap;
        text-align: center
    }

    a.button:hover {
        background: #98ce44
    }

    button.yellow,
    a.button.yellow,
    input[type="button"].button.yellow {
        background: #f0715f
    }
    .five-stars-container {
        display: inline-block;
        position: relative;
        font-family: 'Glyphicons Halflings';
        font-size: 14px;
        text-align: left;
        cursor: default;
        white-space: nowrap;
        line-height: 1.2em;
        color: #dbdbdb
    }

    .five-stars-container .five-stars,
    .five-stars-container.editable-rating .ui-slider-range {
        display: block;
        overflow: hidden;
        position: relative;
        background: #fff;
        padding-left: 1px
    }

    .five-stars-container .five-stars:before,
    .five-stars-container.editable-rating .ui-slider-range:before {
        content: "\e006\e006\e006\e006\e006";
        color: #ef715f
    }

    .five-stars-container:before {
        display: block;
        position: absolute;
        top: 0;
        left: 1px;
        content: "\e006\e006\e006\e006\e006";
        z-index: 0
    }

    .price {
        color: #7db921;
        font-size: 1.6667em;
        text-transform: uppercase;
        float: right;
        text-align: right;
        line-height: 1;
        display: block
    }

    .price small {
        display: block;
        color: #838383;
        font-size: 0.5em
    }

    .price-wrapper {
        font-weight: normal;
        text-transform: uppercase;
        font-size: 0.8333em;
        color: inherit;
        line-height: 1.3333em;
        margin: 0
    }

    .price-wrapper .price-per-unit {
        color: #7db921;
        font-size: 1.4em;
        padding-right: 5px
    }

    .image-carousel.style2 .slides>li {
        margin-right: 30px
    }

    .image-box .box>.details,
    .image-box.box>.details {
        padding: 12px 15px
    }

    .listing-style1.hotel .feedback {
        margin: 5px 0;
        border-top: 1px solid #f5f5f5;
        padding-top: 5px;
        border-bottom: 1px solid #f5f5f5
    }

    .listing-style1.hotel .feedback .review {
        display: block;
        float: right;
        text-transform: uppercase;
        font-size: 0.8333em;
        color: #9e9e9e
    }

    .listing-style1.hotel .action .button:last-child {
        float: right
    }

    .box {
        border: 1px solid #cccccc
    }

    .fa {
        color: #f0715f
    }
</style>
<div class="content-grid"style="padding-left:10%;margin-bottom: 10px;padding-top:5% !important;">
    <div class="section-filters-bar v2">

        <div class="row" style=" width: 100%;">
            <div class="col-md-4">
                <label>Devision</label>
                <select class="form-control" name="division_id" required="" id="division_id">
                    <option value="">Select Division</option>
                    @foreach($get_divission as $divission)
                    <option value="{{$divission->id}}">{{$divission->division_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>City</label>
                    <select class="form-control" name="city_id" required="" id="city_id">
                        <option value="">Select Division</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Service Name</label>
                    <select class="form-control" name="service_id" required="" id="service_id">
                        <option value="">Select Service</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row view-group" style="padding-top: 20px;" id="directors">
        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('#division_id').change(function(){
        var division_id = $('#division_id :selected').val();
        $.ajax({
            url: "{{ url('/admin/city/data/') }}"+'/'+division_id,
            success:function(result){
                $('#city_id').empty();
                $('#city_id').append('<option value="">Select City</option>');
                for(var i=0; i<result.length; i++){
                    $('#city_id').append('<option value='+result[i].id+'>'+result[i].city_name+'</option>');
                }
            }
        });
    })
    $('#city_id').change(function(){
        var city_id = $('#city_id :selected').val();

        $.ajax({
            url: "{{ url('/admin/service/data/') }}"+'/'+city_id,
            success:function(result){
                $('#service_id').empty();
                $('#service_id').append('<option value="">Select Service</option>');
                for(var i=0; i<result.length; i++){
                    $('#service_id').append('<option value='+result[i].id+'>'+result[i].service_name+'</option>');
                }
            }
        });
    })
    $('#service_id').change(function(){
        var service_id  = $('#service_id :selected').val();
        var city_id     = $('#city_id :selected').val();
        var division_id = $('#division_id :selected').val();
        $.ajax({
            url: "{{ url('/director/data/') }}",
            data:{service_id:service_id,city_id:city_id,service_id:service_id},
            success:function(result){
                console.log(result);
                $('#directors').empty();
                for(var i=0; i<result.length; i++){
                    $('#directors').append('<div class="item col-xs-4 col-lg-4">'+
                        '<div class="thumbnail card">'+
                            '<div class="img-event">'+
                                '<img class="group list-group-image img-fluid" src="{{asset('/')}}'+result[i].image+'" alt="" style="height:230px;width:100%;"/>'+
                            '</div>'+
                            '<div class="caption card-body">'+
                                '<h4 class="card-title">'+result[i].name+'</h4>'+
                                '<p>'+result[i].email+'</p>'+
                                '<p>'+result[i].phone+'</p>'+
                                '<p>'+result[i].address+'</p>'+
                                '<div class="row" style="background-color: lightgray;padding: 10px 5px;margin-top:20px;">'+
                                    '<div class="col-xs-12 col-md-6">'+
                                        '<p class="lead">'+result[i].division_name+'</p>'+
                                    '</div>'+
                                    '<div class="col-xs-12 col-md-6">'+
                                        '<p class="lead">'+result[i].city_name+'</p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>');
                }
            }
        });
    })
</script>
@stop