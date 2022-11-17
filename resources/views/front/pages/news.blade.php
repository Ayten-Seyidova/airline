@extends('front.index')
@section('title')
    @lang('translation.news-title')
@endsection
@section('css')

@endsection
@section('content')
    <?php
    function cleaner($text, $character)
    {
        $text = strip_tags($text);
        $text = html_entity_decode($text);
        $text = mb_substr($text, 0, $character);

        return $text;
    }
    ?>

    <main>
        @php($lang = app()->getLocale())
        @if(!empty($news[0]))
            <div class="news-page">
                <h3>@lang('translation.news-title')</h3>
                <div class="container">
                    @foreach($news as $newsItem)
                        <div class="mb-5">
                            <div class="news-page-body">
                                <div class="news-page-image">
                                    <img class="img-thumbnail" src="{{asset('/storage/'.$newsItem->image)}}" alt="">
                                </div>
                                <div class="news-page-content">
                                    <h4>{{cleaner($newsItem->{'title_'.$lang}, 50)}}{{\Illuminate\Support\Str::length($newsItem->{'title_'.$lang} )>50 ? '..' : ''}}</h4>
                                    {{cleaner($newsItem->{'content_'.$lang}, 500)}}{{\Illuminate\Support\Str::length(strip_tags(html_entity_decode($newsItem->{'content_'.$lang})))>500 ? '..' : ''}}
                                </div>
                            </div>
                            <div class="news-page-button">
                                <a href="{{url('/xeberler/'.$newsItem->slug)}}">@lang('translation.read')</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">{{$news->appends(request()->input())->links()}}</div>
        @else
            @if(isset($_GET['search']))
                <div class="text-center" style="margin-top: 90px">@lang('translation.no-result')</div>
            @else
                <div class="text-center" style="margin-top: 90px">@lang('translation.soon')</div>
            @endif
        @endif
    </main>

@endsection
@section('js')
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

