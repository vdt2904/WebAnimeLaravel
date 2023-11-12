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

.main {
    padding: 20px;
}

h2 {
    color: #fff;
}

.transaction-history {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.transaction {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    margin: 10px;
    text-align: center;
    max-width: 300px;
}

.date {
    font-weight: bold;
}

.package-name,
.amount {
    margin: 5px 0;
}

h4 {
    color: #fff;
    margin-bottom: 50px;
}

.personal__account-security .item {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
}

.col-lg-9,
.col-md-9,
.col-sm-9 {
    margin-top: 100px;
    margin-bottom: 100px;
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

.label .info,
.name {
    color: #fff;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #3498db;
    color: #fff;
}


    </style>
</head>

<body>
    @include('home.header')
    @yield('section')


    <section>
        <div class="container-fluid">
            <div class="row" style="min-height: 500px;">
                <!-- Phần bên trái (20%) -->
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="p-3">
                        <h4>Lịch sử giao dịch</h4>
                        <div style="border:1px solid; margin-bottom: 20px;"></div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('/User')}}">Thông tin cá nhân</a>
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
                            @if (empty($sql))
                                <p style="color: #fff;">Không có lịch sử mua hàng</p>
                            @else
                            <table>
                                <thead>
                                    <tr>
                                        <th>Gói Cước</th>
                                        <th>Ngày mua</th>
                                        <th>Thời Hạn</th>
                                        <th>Giá</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach ($sql as $transaction)
                            <tr>
                                <td>{{ $transaction->MaGoi }}</td>
                                <td>{{ $transaction->NgayMua }}</td>
                                <td>{{ $transaction->ThoiGianSD }} tháng</td>
                                <td>{{ $transaction->Gia }}$</td>
                                <td>{{ $transaction->GhiChu }}</td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
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