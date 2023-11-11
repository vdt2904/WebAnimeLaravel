
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
                        <h6>Date Submitted - <span> {{ $data[0]->NgayDang }} </span></h6>
                        <h1 style="color:aliceblue">Blog : {{ $data[0]->TenBlog }}</h1>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__pic">
                        <img src="{{ $data[0]->Anh }}" alt="">
                    </div>
                </div>
                <?php $text = "Your text here";
                $wordCount = str_word_count($text, 0); // Count the number of words
                $halfWordCount = ceil($wordCount / 2); // Calculate half of the word count
                
                $part1 = '';
                $part2 = '';
                
                $token = strtok($text, ' ');
                $count = 0;
                
                // Iterate through the text until reaching the halfway point
                while ($token !== false && $count < $halfWordCount) {
                    $part1 .= $token . ' ';
                    $token = strtok(' ');
                    $count++;
                }
                
                // The remaining part is part2
                $part2 = $token . strtok(''); // Using strtok('') to get the rest of the text
                
                // Now $part1 and $part2 contain the two halves of the text based on words
                
              
                 ?>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            <p>{{ $part1}}</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Tobio-Nishinoya showdown:</h4>
                            <video width="560" height="315" controls>
                                <source src="{{ $data[0]->Trailer }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            
                            <p>{{ $part2}}</p>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__btns__item">
                                        <h5><a href="{{  route('filmdetails', ['id' => $data[0]->MaAnime])}}"><span class="arrow_left"></span>Watch Now</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog__details__btns__item next__btn">
                                        <h5><a href="{{  route('blog.detail', ['id' => $data[0]->IDBlog +1])}}">Other Blog<span
                                            class="arrow_right"></span></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @else
                        <h3 style="height:470px; color: white; text-align:center">Không có bài viết nào</h3>
        </section>
     
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