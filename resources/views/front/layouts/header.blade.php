<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('front/assets/images/rel.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"/>
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet"/>
    <!-- Owl car -->
    <link rel="stylesheet" href="{{asset('front/assets/owlcarousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/owlcarousel/owl.theme.default.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}"/>
    @php($lang = app()->getLocale())
    <title>@yield('title') | {{ $settings->{'title_'. $lang} }}</title>
    <meta name="description" content="{{ $settings->{'description_'. $lang} }}">
    <meta name="keywords" content="{{ $settings->{'keywords_'. $lang} }}">
    @yield('css')
</head>
<body>

<header>
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-top-weather">
                    <img src=""/>
                </div>
                <div class="language-bar">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="flag flag-{{App::getLocale() == 'en' ? 'united-states' : App::getLocale()}}"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a class="dropdown-item" href="{{"/lang/".$lang}}">
                                            <i class="flag flag-{{$lang == 'en' ? 'united-states' : $lang}}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="header-top-search">
                    <i id="header-search-btn" class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="navbar navbar-expand-lg bg-light">
                <div id="navbar-control" class="container">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <p>@lang('translation.nakh-inter')</p>
                        <div class="header-word">
                            <span></span>
                            <span>@lang('translation.airline')</span>
                            <span></span>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    @lang('translation.about')
                                </a>
                                @php($lang = app()->getLocale())
                                <ul class="dropdown-menu">
                                    @foreach($menus1 as $menu1)
                                        <li><a class="dropdown-item"
                                               href="{{url($menu1->slug)}}">{{$menu1->{'name_'.$lang} }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    @lang('translation.passenger')
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($menus2 as $menu2)
                                        <li><a class="dropdown-item"
                                               href="{{url($menu2->slug)}}">{{$menu2->{'name_'.$lang} }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    @lang('translation.transport')
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($menus3 as $menu3)
                                        <li><a class="dropdown-item"
                                               href="{{url($menu3->slug)}}">{{$menu3->{'name_'.$lang} }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    @lang('translation.services')
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($menus4 as $menu4)
                                        <li><a class="dropdown-item"
                                               href="{{url($menu4->slug)}}">{{$menu4->{'name_'.$lang} }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                        <form id="search-form-navbar" class="d-none" role="search">
                            <input
                                class="form-control me-2"
                                type="search"
                                name="search"
                                placeholder="@lang('translation.search')"
                                aria-label="Search"/>
                            <button class="btn btn-outline-success" type="submit">
                                @lang('translation.search')
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
