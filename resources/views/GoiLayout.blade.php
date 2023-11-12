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



        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h2 {
            margin: 20px;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .col-lg-9,
.col-md-9,
.col-sm-9 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.package {
    width: calc(35% - 20px);
    margin: 20px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
}

@media (max-width: 991px) {
    .package {
        width: calc(50% - 20px);
    }
}

@media (max-width: 767px) {
    .package {
        width: calc(100% - 20px);
    }
}

        .buy-button {
            background-color: #3498db;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .buy-button:hover {
            background-color: #2980b9;
        }


        .col-lg-9,
        .col-md-9,
        .col-sm-9 {
            /* display: contents; */
            color: #fff;
        }

        .item .button-change {
            float: right;
        }

        .item {
            margin-bottom: 20px;
        }

        .nav-item .nav-link {
            color: gray;
        }

        .nav-link,
        .label {
            color: gray;
        }

        .nav-item .nav-link:hover {
            color: white;
        }

        .nav-link:hover {
            color: white;
        }

        .label .info , .name{
            color: #fff;
        }

        h4 {
            color: #fff;
        }
        .row {
    display: flex;
    flex-wrap: wrap;
}

.col-lg-3 {
    width: 20%; /* Đặt chiều rộng 20% cho cột bên trái */
}

.col-lg-9 {
    width: 80%;
    float: left;
    color: #fff;
}
    </style>
</head>

<body>
    @include('home.header')
    @yield('section')

    <section class="package-list">
        <div class="container-fluid">
            <div class="row">
                <!-- Phần bên trái (20%) -->
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="p-3">
                        <h4>Thông Tin Tài Khoản</h4>
                        <div style="border:1px solid; margin-bottom: 20px;"></div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/User') }}">Thông tin cá nhân</a>
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
                    @foreach ($packages as $package)
                        <div class="package">
                            <h2>{{ $package['MaGoi'] }}</h2>
                            <p>Thời gian sử dụng: {{ $package['ThoiGianSD'] }} tháng</p>
                            <p>Giá: {{ $package['Gia'] }}$</p>
                            <p>Ghi chú: {{ $package['GhiChu'] }}</p>
                            <form action="{{ route('purchase') }}" method="post">
                                @csrf
                                <input type="hidden" name="MaGoi" value="{{ $package['MaGoi'] }}">
                                @if ($sql > 0)
                                    <button type="submit" disabled style="cursor: not-allowed; opacity: 0.7;" class="buy-button" >Mua Ngay</button>
                                @else
                                    <button type="submit"class="buy-button" >Mua Ngay</button>
                                @endif
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>  
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
{{-- <script>
    function confirmPurchase(packageId) {
        // Hiển thị hộp thoại xác nhận
        var result = confirm("Bạn có chắc muốn mua gói cước này không?");

        // Nếu người dùng chọn OK (Đồng ý)
        if (result) {
            // Submit form nếu xác nhận mua
            document.getElementById("package_id1").value = packageId;
            document.getElementById("purchaseForm").submit();
            alert("Mua gói cước thành công!");
        } else {
            alert("Mua gói cước tb!");
            // Nếu người dùng chọn Cancel (Hủy), không làm gì cả
        }
    }
</script> --}}
