<div class="deznav">
    <ul class="deznav-scroll">
        <a href="{{route('dashboard')}}" class="add-menu-sidebar">Admin Panel</a>
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-home-2" style="width:30px"></i>
                    <span class="nav-text">Ana səhifə</span>
                </a>
            </li>
            <li><a href="{{route("menu.index")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-navicon" style="width:30px"></i>
                    <span class="nav-text">Menyu</span>
                </a>
            </li>
            <li><a href="{{route("static")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-list" style="width:30px"></i>
                    <span class="nav-text">Statik Səhifələr</span>
                </a>
            </li>
            <li><a href="{{route("dropzonePhoto")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-photo" style="width:30px"></i>
                    <span class="nav-text">Foto qalareya</span>
                </a>
            </li>
            <li><a href="{{route("post.index")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-newspaper-o" style="width:30px"></i>
                    <span class="nav-text">Xəbərlər</span>
                </a>
            </li>
            <li><a href="{{route("useful.index")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-link" style="width:30px"></i>
                    <span class="nav-text">Faydalı linklər</span>
                </a>
            </li>
            <li><a href="{{route("tourism.index")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-hotel" style="width:30px"></i>
                    <span class="nav-text">Naxçıvan turizm</span>
                </a>
            </li>
            <li>
                <a href="{{route("settings.index")}}" class="ai-icon" aria-expanded="false">
                    <i class="fas flaticon-381-settings-2" style="width:30px"></i>
                    <span class="nav-text">Tənzimləmələr</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>Hava limanı</strong> © {{ date('Y') }} Bütün hüquqlar qorunur</p>
            <p>Dizayn və proqramlaşdırma <span class="font-weight-bold">RYTN</span></p>
        </div>
</div>
