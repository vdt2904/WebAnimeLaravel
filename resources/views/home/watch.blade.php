<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Anime | Group 5</title>

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
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('home.header')
    <!--Xử lý dữ liệu -->
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <span>{{$b[0][0]->Anime}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="{{$b[0][0]->NenVideo}}">
                            <source src="{{$b[0][0]->Video}}" type="video/mp4" />
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List</h5>
                        </div>
                        <input type="text" id="matp" name="matp" value="{{ $b[0][0]->MaTP }}" hidden readonly>
                        @foreach ($b[1] as $item => $k)
                        @if ($k->MaTP == $b[0][0]->MaTP)
                            <a href="#" style="background-color: aqua">Ep {{$k->Tap}}</a>
                        @else
                            <a href="{{ route('watch', ['maanime' => $b[0][0]->MaAnime, 'matp' => $k->MaTP]) }}">Ep {{$k->Tap}}</a>
                        @endif
                        
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comments</h5>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                        <div id="cmtcontainer">
                            
                        </div>
                        <nav id="pagination" aria-label="Page navigation" class="container mt-3">
                            <ul class="pagination justify-content-center"></ul>
                        </nav>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea class="form-control" placeholder="Your Comment" id="idcmt"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit" onclick="cmt()"><i class="fa fa-location-arrow"></i> Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
    <script type="text/javascript">
        $(document).ready(function () {
            fetchData();
        });
    
        var matp = $("#matp").val();
        var page = 1;
        var perPage = 2;
    
        function fetchData() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/getcomments/' + matp + '/' + page + '/' + perPage,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    const len = response.data.length;
                    let table = '';
                    for (var i = 0; i < len; i++) {
                        var date = new Date(response.data[i].NgayComment);
                        var now = new Date();
                        var date1 = date.toISOString().slice(0, 10);
                        var date2 = now.toISOString().slice(0, 10);
                        var diff = now.getTime() - date.getTime();
                        var diffMinutes = Math.floor(diff / (1000 * 60));
                        var diffDays = Math.floor(diff / (1000 * 60 * 60 * 24));
                        var str = '';
                        if (diffMinutes < 60) {
                            if (diffMinutes === 0) {
                                str = 'just now';
                            } else {
                                str = diffMinutes + ' minutes ago';
                            }
                        } else if (date1 == date2) {
                            var hour = Math.floor(diff / (1000 * 60 * 60));
                            str = hour + ' hours ago';
                        } else if (diffDays <= 3) {
                            str = diffDays + ' days ago';
                        } else {
                            str = date1;
                        }
                        table += '<div class="anime__review__item">';
                        table += '<div class="anime__review__item__pic">';
                        table += '<img src="/home/img/anime/review-1.jpg" alt="">';
                        table += '</div>';
                        table += '<div class="anime__review__item__text">';
                        table += '<h6>' + response.data[i].TenND + ' - <span> ' + str + ' </span></h6>';
                        table += '<p>' + response.data[i].Comment + '</p>';
                        table += '</div>';
                        table += '</div>';
                    }
                    document.getElementById('cmtcontainer').innerHTML = table;
                    renderPagination(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    
        function renderPagination(response) {
            // Clear previous pagination buttons
            $('#pagination ul').empty();
    
            // Add "Previous" button if available
            if (response.prev_page_url !== null) {
                $('#pagination ul').append('<li class="page-item"><a class="page-link" onclick="prevPage()">Previous</a></li>');
            }
    
            // Add page buttons
            var a = response.links.length - 2;
            for (var i = 0; i < response.links.length; i++) {
                var link = response.links[i];
                if (link.active && link.label != '&laquo; Previous' && link.label != 'Next &raquo;') {
                    $('#pagination ul').append('<li class="page-item active"><span class="page-link">' + link.label + '</span></li>');
                }
                if(!link.active && link.label != '&laquo; Previous' && link.label != 'Next &raquo;'){
                    $('#pagination ul').append('<li class="page-item"><a class="page-link" onclick="goToPage(' + link.label + ')">' + link.label + '</a></li>');
                }
                if(link.label == '&laquo; Previous'){
                    $('#pagination ul').append('<li class="page-item"><a class="page-link" onclick="goToPage(1)">' + link.label + '</a></li>');
                }
                if(link.label == 'Next &raquo;'){                   
                    $('#pagination ul').append('<li class="page-item"><a class="page-link" onclick="goToPage(' + a + ')">' + link.label + '</a></li>');
                }
            }   
            // Add "Next" button if available
            if (response.next_page_url !== null) {
                $('#pagination ul').append('<li class="page-item"><a class="page-link" onclick="nextPage()">Next</a></li>');
            }
        }
    
        function nextPage() {
            page++;
            fetchData();
        }
    
        function prevPage() {
            page--;
            fetchData();
        }
    
        function goToPage(pageNumber) {
            page = pageNumber;
            fetchData();
        }
        function cmt() {
            var ul = 'http://127.0.0.1:8000/api/comment/' + $('#matp').val();
            var cmtData = {
                cmt: $('#idcmt').val(),
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                url: ul,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(cmtData),
                dataType: 'text',
                success: function (response) {
                    fetchData();
                    $('#idcmt').val('');
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Cập nhật không thành công: " + xhr.responseText);
                }
            });
        }
        var video = document.getElementById("player");
        var halfwayReached = false;
        video.addEventListener('timeupdate', function() {
            var currentTime = video.currentTime;
            var duration = video.duration;

            // Kiểm tra khi nào người xem đến giữa phim
            if (!halfwayReached && currentTime > duration / 2) {
                halfwayReached = true;
                // Gọi hàm insertView() ở đây
                insertView();
            }
        });
        function insertView() {
        var maTP = $('#matp').val(); // Cần cung cấp mã phim từ dữ liệu phía client
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/api/view/' + maTP,
            method: 'POST',
            headers: {
            'X-CSRF-TOKEN': csrfToken // Thêm token CSRF vào header
            },
            dataType: 'json',
            success: function (response) {
                console.log('Insert thành công!');
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Lỗi khi insert:', xhr.responseText);
            }
        });
    }
    </script>
    
    <!--kết thúc Xử lý dữ liệu -->
    @include('home.footer')
    @include('home.search')
    @include('home.script')
</body>