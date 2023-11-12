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
    <style>
        h4{
            color: #fff;
            margin-bottom: 50px;
        }
        .personal__account-security .item {
    border-bottom: 1px solid #ccc; /* Chọn màu và kích thước border phù hợp */
    padding-bottom: 10px; /* Điều chỉnh khoảng cách giữa border và nội dung */
}
.col-lg-9, .col-md-9, .col-sm-9,.name {
    color: #fff;
}
.item .button-change {
    float: right;
}

/* Điều chỉnh khoảng cách giữa các mục */
.item {
    margin-bottom: 20px;
}
.nav-item .nav-link {
    color: gray;
}

/* Thay đổi màu chữ của nút "Đăng xuất tài khoản" */
.nav-link ,.label {
    color: gray;
}
.nav-item .nav-link:hover {
    color: white;
}

/* Khi di chuột vào, thay đổi màu chữ của nút "Đăng xuất tài khoản" sang màu trắng */
.nav-link:hover {
    color: white;
}
.label .info{
    color: #fff;
}
    </style>
</head>

<body>
    @include('home.header')
    @yield('section')

    <section>
        <div class="container-fluid">
            <div class="row">
                <!-- Phần bên trái (20%) -->
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="p-3">
                        <h4>Thông Tin Tài Khoản</h4>
                        <div style="border:1px solid; margin-bottom: 20px;"></div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Thông tin cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('goiLayout')}}">Mua gói cước</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('history')}}">Lịch sử giao dịch</a>
                            </li>
                        </ul>
                        <a href="{{route('logoutUser')}}" class="nav-link">Đăng xuất tài khoản</a>
                    </div>
                </div>
        
                <!-- Phần bên phải (80%) -->
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="p-3">
                        <h5>Hồ sơ</h5>
                        <div class="personal__profile">
                            <div class="d-flex align-items-center">
                                <span class="b-avatar img-avatar badge-secondary rounded-circle">
                                    <span class="b-avatar-img">
                                        <img src="https://images.fptplay.net/media/structure/default_avatar_new_2023_03_08.png" alt="avatar">
                                    </span>
                                </span>
                                <div class="profile-info">
                                    <div class="profile-info-div">
                                        <p class="name">Viet Do Duc</p>
                                        {{-- <div class="d-flex align-items-center">
                                            <span class="label">Giới tính: <span class="info">(Chưa cập nhật)</span></span>
                                            <span class="label">Sinh nhật: <span class="info">(Chưa cập nhật)</span></span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Tài khoản và bảo mật</h5>
                        <div class="personal__account-security container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="item">
                                        <span class="label"> <span hidden class="info">{{session('InforUser.MaND')}}</span></span>
                                        <div class="button-change"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="item">
                                        <span class="label">Tên người dùng <span class="info">{{session('InforUser.TenND')}}</span></span>
                                        <div class="button-change">Thay đổi</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="item">
                                        <span class="label">E-mail <span class="info">{{session('InforUser.Email')}}</span></span>
                                        <div class="button-change"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="item">
                                        <span class="label">Sô điện thoại <span class="info">{{session('InforUser.SDT')}}</span></span>
                                        <div class="button-change">Thay đổi</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="item">
                                        <span class="label">Mật Khẩu<span class="info">   ********</span></span>
                                        <div class="button-change">Thay đổi</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="item">
                                       
                                       
                                        <span class="label">Loại tài khoản<span class="info">
                                            @if (session('InforUser.LoaiND') == 0) 
                                            Thường
                                            @else
                                            VIP
                                            @endif
                                            
                                        </span></span>
                                        <div class="button-change"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
    @include('home.footer')
    <!-- Footer Section End -->
    <!-- Search model Begin -->
    @include('home.search')
    <!-- Search model end -->
   <!-- Js Plugins -->

    @include('home.script')
</body>

</html>