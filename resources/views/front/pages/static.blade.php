@extends('front.index')
@section('title')
    @php($lang = app()->getLocale())
    {{$category[0]->{'name_'.$lang} }}
@endsection
@section('css')

@endsection
@section('content')
    <main class="container" style="margin-top: 80px">
        <div>
            {!! $static[0]->{'content_'.$lang} !!}
        </div>
    </main>
@endsection
@section('js')
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

