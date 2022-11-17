@extends('front.index')
@php($lang = app()->getLocale())
@section('title')
    {{$news[0]->{'title_'.$lang} }}
@endsection
@section('css')
@endsection
@section('content')
    <main>
        <div class="container mt-5">
            <div class="news-page-image">
                <img class="img-thumbnail m-auto d-block" src="{{asset('/storage/'.$news[0]->image)}}" alt="">
            </div>
            <h4 class="text-center my-3">{{$news[0]->{'title_'.$lang} }}</h4>
            <div class="news-page-content">
                {!! $news[0]->{'content_'.$lang} !!}
            </div>

        </div>
    </main>
@endsection
@section('js')
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

