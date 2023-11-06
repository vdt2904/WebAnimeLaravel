
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/Home/img/icon.jpg" type="image/png">
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
    <title>Anime |  @if($data->isNotEmpty())
        {{ $data[0]->TenBlog }}@else Default @endif </title>
   
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('home.header')
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    @if($data->isNotEmpty())
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__title">
                        
                        <h6>Date Submitted = <span>{{ $data[0]->NgayDang }}</span></h6>
                        <h2>{{ $data[0]->TenBlog }}</h2>
                      
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__pic">
                        <img src="{{ $data[0]->Anh }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            <p>As a result the last couple of eps haven’t been super exciting for me, because they’ve
                                been more like settling into a familiar and comfortable routine.  We’re seeing character
                                growth here but it’s subtle (apart from Shouyou, arguably).  I mean, Tobio being an
                                asshole is nothing new – it’s kind of the foundation of his entire character arc. 
                                Confronting whether his being an asshole is a problem for the Crows this directly is a
                                bit of an evolution, and probably an overdue one at that, but the overall dynamic with
                            Kageyama is basically unchanged.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Tobio-Nishinoya showdown:</h4>
                            <img src="/Home/img/blog/details/bd-item-1.jpg" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Nanatsu no Taizai: Kamigami No Gekirin</h4>
                            <img src="/Home/img/blog/details/bd-item-2.jpg" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>ID:Ianvaded:</h4>
                            <img src="/Home/img/blog/details/bd-item-3.jpg" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__tags">
                            <a href="#">Healthfood</a>
                            <a href="#">Sport</a>
                            <a href="#">Game</a>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__btns__item">
                                        <h5><a href="#"><span class="arrow_left"></span> Building a Better LiA...</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog__details__btns__item next__btn">
                                        <h5><a href="#">Mugen no Juunin: Immortal – 21 <span
                                            class="arrow_right"></span></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__details__comment">
                                <h4>3 Comments</h4>
                                <div class="blog__details__comment__item">
                                    <div class="blog__details__comment__item__pic">
                                        <img src="/Home/img/blog/details/comment-1.png" alt="">
                                    </div>
                                    <div class="blog__details__comment__item__text">
                                        <span>Sep 08, 2020</span>
                                        <h5>John Smith</h5>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi</p>
                                        <a href="#">Like</a>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                <div class="blog__details__comment__item blog__details__comment__item--reply">
                                    <div class="blog__details__comment__item__pic">
                                        <img src="/Home/img/blog/details/comment-2.png" alt="">
                                    </div>
                                    <div class="blog__details__comment__item__text">
                                        <span>Sep 08, 2020</span>
                                        <h5>Elizabeth Perry</h5>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi</p>
                                        <a href="#">Like</a>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                <div class="blog__details__comment__item">
                                    <div class="blog__details__comment__item__pic">
                                        <img src="/Home/img/blog/details/comment-3.png" alt="">
                                    </div>
                                    <div class="blog__details__comment__item__text">
                                        <span>Sep 08, 2020</span>
                                        <h5>Adrian Coleman</h5>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi</p>
                                        <a href="#">Like</a>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__details__form">
                                <h4>Leave A Commnet</h4>
                                <form method="POST" action="{{ route('blog.SendReview'  ,['id' => $data[0]->IDBlog])}}">
                                    @csrf
                                    <div class="row">
                                    
                                        <div class="col-lg-12">
                                            <textarea name = 'review' placeholder="Message"></textarea>
                                            <button type="submit" class="site-btn">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <h1>Không có bài viết nào</h1>
        @endif
        <!-- Blog Details Section End -->

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