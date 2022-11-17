@extends('admin.index')

@section('title')
    Statik səhifələr
@endsection

@section('css')

@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid pt-5">
            <div class="row">
                @if(!empty($categories))
                    @foreach($categories as $category)
                        <div class="col-xl-12 col-md-6">
                            <div class="card border-left-secondary shadow">
                                <div class="card-body p-0">
                                    <div class="row no-gutters align-items-center" style="padding: 10px">
                                        <div class="text-center">
                                            <a href="{{route('static-page.index',['page'=>$category->id])}}"
                                               class="font-weight-normal text-secondary"
                                               style="text-align:center; font-size: 20px;">
                                                {{$category->name_az}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


@endsection

@section('js')

@endsection
