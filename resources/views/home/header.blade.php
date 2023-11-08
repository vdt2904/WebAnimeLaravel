<!-- Header Section Begin -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('HomeLayout') }}">
                        <img src="/Home/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('HomeLayout') }}">Homepage</a></li>
                            <li><a href="#">Categories <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="#">Categories</a></li>
                                    <li><a href="#">Anime Details</a></li>
                                    <li><a href="#">Anime Watching</a></li>
                                    <li><a href="#">Blog Details</a></li>
                                    <li><a href="#">Sign Up</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/blog') }}">Our Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contacts</a></li>
                            <li><a href="#" class="search-switch"><span class="icon_search"></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
           
            <div class="col-lg-2">
                <div class="header__right">                   
                    <a href="{{ url('/login') }}" class="profile-link"><span class="icon_profile"></span><span>  {{ session('InforUser.TenND') }}</span></a>
                  
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

  

