@extends('admin.index')

@section('title')
    Admin panel
@endsection

@section('css')
    <style>
        .card-body {
            padding: 10px !important;
        }
    </style>
@endsection

@section('content')

    <div class="content-body mb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('dashboard')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Ana səhifə</a>
                                </div>
                                <div class="col-auto">
                                    <i class="flaticon-381-home-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('menu.index')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Menyu</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-navicon text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('static')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Statik Səhifələr</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('dropzonePhoto')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Foto qalareya</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-photo text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('post.index')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Xəbərlər</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-newspaper-o text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('useful.index')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Faydalı linklər</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-link text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('tourism.index')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Naxçıvan turizm</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hotel text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-1">
                    <div class="card border-left-primary shadow px-3 py-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <a href="{{route('settings.index')}}" class="font-weight-normal text-primary"
                                       style="text-align:center; font-size: 20px;">
                                        Tənzimləmələr</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas flaticon-381-settings-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
