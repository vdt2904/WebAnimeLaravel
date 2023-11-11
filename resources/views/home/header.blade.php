<!-- Header Section Begin -->
@php
    use Illuminate\Support\Facades\DB;
@endphp
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/">
                        <img src="/Home/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="#">Thể loại <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @php
                                        $a = DB::select('SELECT theloai,MaTL from tb_theloai');
                                    @endphp
                                    @foreach ($a as $item => $k)
                                    <li><a href="{{ route('category', ['id' => $k->MaTL]) }}">{{$k->theloai}}</a></li>    
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <a href="{{url('/login')}}"><span class="icon_profile"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->