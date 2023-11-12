<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Our Blog</title>
    
    <!-- Google Font -->
    <link rel="icon" href="Home/img/icon.jpg" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="Home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="Home/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="Home/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="Home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="Home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="Home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="Home/css/style.css" type="text/css">
</head>

<body>
    @include('home.header')
    
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="Home/img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Our Blog</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                @if(!empty($data[0]))
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="{{ $data[0] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span>{{ $data[0] ->NgayDang }} </p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[0]->MaAnime]) }}">{{$data[0]->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    
                    @else
                     <h1>Don't have Blog</h1>
                    @endif
                    @if(!empty($data[1]))
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[1] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[1]->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[1]->MaAnime]) }}">{{ $data[1] ->TenBlog }}8</a></h4>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($data[2]))
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg=" {{ $data[2] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span>   {{ $data[2] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[2]->MaAnime]) }}"> {{ $data[2] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endif
                    
                        @if(!empty($data[3]))
                        
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="{{ $data[3] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[2] ->NgayDang}}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[3]->MaAnime]) }}">{{ $data[3] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($data[4]))
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[4] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[3] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[2]->MaAnime]) }}">{{ $data[4] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    
                    @endif
                       
                        @if(!empty($data[5]))
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[5] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[5] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[5]->MaAnime]) }}">{{ $data[5] ->TenBlog}} </a></h4>
                                </div>
                            </div>
                        </div>
                       
                      @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @if(!empty($data[6]))
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[6] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[6] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[6]->MaAnime]) }}">{{ $data[6] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    
                    @endif
                    @if(!empty($data[7]))
                       <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[7] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[7] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[7]->MaAnime]) }}">{{ $data[7] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!empty($data[8]))
                       
                         <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="{{ $data[8] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span>{{ $data[8] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[8]->MaAnime]) }}">{{ $data[8] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    
                    @endif
                    @if(!empty($data[9]))
                    
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[9] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span>{{ $data[9] ->NgayDang }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[9]->MaAnime]) }}">{{ $data[9] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    
                    @endif
                    @if(!empty($data[10]))
                    
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="{{ $data[10] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[10] ->NgayDang }}0</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[10]->MaAnime]) }}">{{ $data[10] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!empty($data[11]))
                    
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="{{ $data[11] ->Anh }}">
                                <div class="blog__item__text">
                                    <p><span class="icon_calendar"></span> {{ $data[11] ->Anh }}</p>
                                    <h4><a href="{{ route('blog.detail', ['id' => $data[11]->MaAnime]) }}">{{ $data[11] ->TenBlog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    
                     @endif
                    </div>
                </div>
            </div>
            <div class="custom-pagination">
                <ul class="pagination" style=" color: white;">
                    {{ $data->links() }}</ul>
            </div>
            
            
        </div>
     
    </section>
    <!-- Blog Section End -->
    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->
    <!-- Search model Begin -->
    @include('home.search')
    <!-- Search model end -->
    <!-- Js Plugins -->
    @include('home.script')
    
</body>

</html>