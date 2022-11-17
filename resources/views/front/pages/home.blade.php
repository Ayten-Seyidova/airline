@extends('front.index')
@section('title')
    Əsas səhifə
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
        <div class="slider">
            <div class="slider__slide slider__slide--active" data-slide="1">
                <div class="slider__wrap">
                    <div class="slider__back"></div>
                </div>
                <div class="slider__inner">
                    <div class="slider__content">
                        <!-- <a class="go-to-next">next</a> -->
                    </div>
                </div>
            </div>
            <div class="slider__slide" data-slide="2">
                <div class="slider__wrap">
                    <div class="slider__back"></div>
                </div>
                <div class="slider__inner">
                    <div class="slider__content">
                        <a class="go-to-next">next</a>
                    </div>
                </div>
            </div>
            <div class="slider__slide" data-slide="3">
                <div class="slider__wrap">
                    <div class="slider__back"></div>
                </div>
                <div class="slider__inner">
                    <div class="slider__content">
                        <!-- <a class="go-to-next">next</a> -->
                    </div>
                </div>
            </div>
            <div class="slider__indicators"></div>
        </div>


        @if(!empty($news[0]))
            <section class="news">
                <a href="{{url('xeberler')}}"><h3 class="news-title">@lang('translation.news')</h3></a>
                <div class="news-body">
                    <div class="container">
                        <div class="owl-carousel owl-carousel1 owl-theme">
                            @foreach($news as $newsItem)
                                @php($createDate = \Carbon\Carbon::parse($newsItem->created_at))
                                <div class="card">
                                    <img
                                        src="{{asset('/storage/'.$newsItem->image)}}"
                                        class="card-img-top"
                                        alt="..."
                                    />
                                    <div class="card-body">
                                        <h5 class="card-title">{{cleaner($newsItem->{'title_'.$lang}, 30)}}{{strlen($newsItem->{'title_'.$lang})>30 ? '..' : ''}}</h5>
                                        <p class="card-text">
                                            {{cleaner($newsItem->{'content_'.$lang}, 60)}}{{\Illuminate\Support\Str::length(strip_tags(html_entity_decode($newsItem->{'content_'.$lang})))>60 ? '..' : ''}}
                                        </p>
                                        <div class="card-body-bottom">
                                            <a href="{{url('/xeberler/'.$newsItem->slug)}}">@lang('translation.more')</a>
                                            <p class="card-date">{{$createDate->translatedFormat('d.m.Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if(!empty($photos[0]))
            <section class="photoGallery">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($photos as $photo)
                            <div class="swiper-slide">
                                <img src="{{asset('/storage/'.$photo->image)}}"/>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        @endif

        <section class="turizm">
            <div class="container">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <div class="turizm-head">
                        <a href="">@lang('translation.nakhchivan') <span>@lang('translation.tourism')</span></a>
                    </div>
                    <div class="turizm-choose">
                        @foreach($categories as $key => $category)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$key==0 ? 'active' : ''}}" id="pills-{{$key}}-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-{{$key}}"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-{{$key}}"
                                        aria-selected="true">
                                    {{$category->{'name_'.$lang} }}
                                </button>
                            </li>
                        @endforeach
                    </div>
                </ul>
                @foreach($categories as $key => $category)
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade {{$key==0 ? 'show active' : ''}}"
                             id="pills-{{$key}}"
                             role="tabpanel"
                             aria-labelledby="pills-{{$key}}-tab"
                             tabindex="0">
                            <div class="owl-carousel owl-carousel2 owl-theme">
                                @php($tourisms = \App\Models\Tourism::where('status', 1)->where('category_id', $category->id)->orderBy('id', 'desc')->get())
                                @foreach($tourisms as $tourism)
                                    <a href="{{$tourism->link}}" target="_blank" class="tourist-slider d-inline-block">
                                        <img src="{{asset('/storage/'.$tourism->image)}}" alt=""/>
                                        <span class="text-white">{{$tourism->{'title_'.$lang} }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        @if(!empty($links[0]))
            <section class="usefull-link">
                <div class="owl-carousel owl-carousel3 owl-theme">
                    @foreach($links as $link)
                        <a href="{{$link->link}}" target="_blank" class="usefull-slider d-inline-block">
                            <img src="{{asset('/storage/'.$link->image)}}" alt=""/>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </main>

@endsection

@section('js')
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

