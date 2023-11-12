<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime </title>
    <link rel="icon" href="/Home/img/icon.jpg" type="image/png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/Home/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
@php
    use Illuminate\Support\Facades\DB;
@endphp
    <!-- Header Section Begin -->
    @include('home.header')
    <!-- Header End -->
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>Romance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ $filmdetails[0]->Anh }}">
                            <div class="comment"><i class="fa fa-comments"></i> {{$countrate}}</div>
                           
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $filmdetails[0]->Anime }}</h3>
                                
                            </div>
                            <div class="anime__details__rating" id="ratingContainer">
                                <div class="rating">
                                    <a href="#" onclick="rateAnime(1)"><i class="fa fa-star"></i></a>
                                    <a href="#" onclick="rateAnime(2)"><i class="fa fa-star"></i></a>
                                    <a href="#" onclick="rateAnime(3)"><i class="fa fa-star"></i></a>
                                    <a href="#" onclick="rateAnime(4)"><i class="fa fa-star"></i></a>
                                    <a href="#" onclick="rateAnime(5)"><i class="fa fa-star fa fa-star-half-o"></i></a>
                                </div>
                                <span>
                                    Average rating: {{ $ratetb }}</span>
                            </div>



                        </div>
                        <p>{{ $filmdetails[0]->ThongTin }}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Episode:</span> {{$filmdetails[0]->TongSoTap}}</li>
                                        <li><span>Studios:</span> {{$filmdetails[0]->HangPhim}}</li>
                                        <li><span>Date aired:</span>{{ $filmdetails[0]->NgayPhatSong }}</li>
                                        <li><span>Status:</span> Airing</li>
                                        <li><span>Genre:</span> @foreach($filmdetails as $item)
                                          
                                                {{ $item->TheLoai }}<span>,</span>
                                           
                                        @endforeach </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            @php
                                $a = DB::select('SELECT MaTP from tb_tapphim where MaAnime = ? order by MaTP asc',[$filmdetails[0]->MaAnime]);

                            @endphp
                            <a href="{{ route('watch', ['maanime' => $filmdetails[0]->MaAnime, 'matp' => $a[0]->MaTP]) }}" class="watch-btn"><span>Watch Now</span> <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="section-title">
                    <h5>Trailer</h5>
                </div>
                <video width="100%" controls>
                    <source src="{{$video->Trailer}}" type="video/mp4">                  
                </video>
                <br>
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    @foreach ($review as $rv)
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="/Home/img/icon_nd.jpg" alt="">
                        </div>
                
                        <div class="anime__review__item__text">
                            <h6>{{ $rv->TenND }} <span>{{ $rv->NgayReview }}</span></h6>
                            <p>{{ $rv->Review }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="{{ route('SendReview',['id'=> $filmdetails[0] ->MaAnime])}}" method="post">
                        @csrf
                        <textarea name ="review" placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>
            </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="anime__details__sidebar">
                    <div class="section-title">
                        <h5>you might like...</h5>
                    </div>
                    @foreach ($might as $item=>$k)
                    <div class="product__sidebar__view__item set-bg" data-setbg="{{$k->AnhNgang}}">
                        <div class="ep">{{$k->MaxTap}} / @if ($k->TongSoTap == null)
                            ??
                        @else
                            {{$k->TongSoTap}}
                        @endif
                        </div>
                        <div class="view"><i class="fa fa-eye"></i> {{$k->TongViews}}</div>
                        <h5><a href="/filmdetails/{{$k->MaAnime}}">{{$k->Anime}}</a></h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </section>
        
        @include('home.script')
        <script>
            let userRating = 0;

            function rateAnime(rating) {
                userRating = rating;
                highlightStars(rating);
            }

            function highlightStars(rating) {
                const stars = document.querySelectorAll('.rating a i');

                for (let i = 0; i < stars.length; i++) {
                    if (i < rating) {
                        stars[i].classList.add('fa-star', 'clicked');
                        stars[i].classList.remove('fa-star-o');
                    } else {
                        stars[i].classList.add('fa-star-o');
                        stars[i].classList.remove('fa-star', 'clicked');
                    }
                }
            }
        </script>
</body>

</html>
