@extends('layouts.frontend_layout')
@section('contents')
<div class="content-grid"style="padding-left:10%;margin-bottom: 10px;padding-top:5% !important;">
    <div class="section-filters-bar v2">
        <form class="form" method="GET" action="{{ route('searchEbook') }}" enctype="multipart/form-data">
            @csrf()
            <div class="form-item split medium">
                <div class="form-select" style="width: 100%;">
                    <input type="text" name="title" class="form-control" placeholder="search E-Library with Title ...">
                </div>
                <button type="submit" class="button secondary">Search E-Library</button>
            </div>
        </form>
    </div>
    {{-- Contant Table --}}
    <div class="table table-quests split-rows">
        <div class="table-header">
            <div class="table-header-column">
                <p class="table-header-title">E-Library</p>
            </div>
            <div class="table-header-column">
                <p class="table-header-title">Description</p>
            </div>
            <div class="table-header-column" style="width: 150px;">
                <p class="table-header-title">File</p>
            </div>
            <div class="table-header-column" style="width: 200px;">
                <p class="table-header-title">Action</p>
            </div>
        </div>
        <div class="table-body same-color-rows">
            @foreach($get_library as $library)
            <div class="table-row small">
                <div class="table-column">
                    <div class="table-information">
                        <img class="table-image" src="{{asset($library->icon)}}" alt="completedq-s" style="width: 40px;">
                        <p class="table-title">{{$library->title}}</p>
                    </div>
                </div>
                <div class="table-column">
                    <p class="table-text">{{$library->description}}
                    </p>
                </div>
                <div class="table-column">
                    <p class="table-text">
                        <a href="{{asset($library->file)}}" target="_blank">
                            <i class="lni lni-folder" style="font-size: 20px;color: #ed2124;"></i>
                        </a>
                    </p>
                </div>
                <div class="table-column">
                    <p class="table-text btn btn-info">
                        <a href="{{asset($library->file)}}" target="_blank">
                            <i class="lni lni-eye" style="color: white;"></i>
                            View
                        </a>
                    </p>
                    <p class="table-text btn btn-danger">
                        <a href="{{asset($library->file)}}" download>
                            <i class="lni lni-cloud-download" style="color: white;"></i>
                            Download
                        </a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop