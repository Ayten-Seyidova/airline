<footer>
    @php($lang = app()->getLocale())
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h4>@lang('translation.about')</h4>
                @foreach($menus1 as $menu1)
                    <a href="{{url($menu1->slug)}}">{{$menu1->{'name_'.$lang} }}</a>
                @endforeach
            </div>
            <div class="col-lg-3">
                <h4>@lang('translation.passenger')</h4>
                @foreach($menus2 as $menu2)
                    <a href="{{url($menu2->slug)}}">{{$menu2->{'name_'.$lang} }}</a>
                @endforeach
            </div>
            <div class="col-lg-3">
                <h4>@lang('translation.transport')</h4>
                @foreach($menus3 as $menu3)
                    <a href="{{url($menu3->slug)}}">{{$menu3->{'name_'.$lang} }}</a>
                @endforeach
            </div>
            <div class="col-lg-3">
                <h4>@lang('translation.services')</h4>
                @foreach($menus4 as $menu4)
                    <a href="{{url($menu4->slug)}}">{{$menu4->{'name_'.$lang} }}</a>
                @endforeach

                <div class="footer-contact">
                    <p>@lang('translation.tel'): {{$settings->phone}}</p>
                    <p>@lang('translation.fax'): {{$settings->fax}}</p>
                </div>
            </div>

        </div>

    </div>
</footer>
<div class="copy">
    <p>© {{date('Y')}} @lang('translation.footer')</p>
</div>

<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

@yield('js')

<!-- Owl -->
<script src="{{asset('front/assets/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.3/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>

<!-- Pure Javascript -->
<script src="{{asset('front/assets/js/header.js')}}"></script>
<script src="{{asset('front/assets/js/news.js')}}"></script>
<script src="{{asset('front/assets/js/photo.js')}}"></script>
<script src="{{asset('front/assets/js/turizm.js')}}"></script>
<script src="{{asset('front/assets/js/usefull.js')}}"></script>
<script src="{{asset('front/assets/js/index.js')}}"></script>

</body>
</html>
