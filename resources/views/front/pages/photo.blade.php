@extends('front.index')
@section('title')
    @php($lang = app()->getLocale())
    @lang('translation.photo')
@endsection
@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('front/assets/css/prettyPhoto.css')}}" type="text/css" media="screen"
          title="prettyPhoto main stylesheet" charset="utf-8"/>
    <script src="{{asset('front/assets/js/jquery.prettyPhoto.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection
@section('content')
    <main class="mt-5">
        @if(!empty($photos[0]))
            <div class="photo-section container">
                <h3 class="photo-title text-center font-weight-bold mb-4">@lang('translation.photo')</h3>
                <div class="photo-images gallery row">
                    @foreach($photos as $photo)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                            <a href="{{asset('/storage/'.$photo->image)}}" class="gallery-img"
                               rel="prettyPhoto[gallery1]">
                                <img class="d-block w-100 h-100 img-thumbnail" src="{{asset('/storage/'.$photo->image)}}"/>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">{{$photos->appends(request()->input())->links()}}</div>
        @else
            <div class="text-center" style="margin-top: 50px">@lang('translation.soon')</div>
        @endif
    </main>
@endsection
@section('js')
    <script>
        $("area[rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: "fast",
            slideshow: 10000,
            hideflash: true,
        });
    </script>
@endsection

