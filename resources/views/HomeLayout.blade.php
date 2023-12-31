
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Group 5</title>
    <link rel="icon" href="Home/img/icon.jpg" type="image/png">
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
   
    @if(session('success'))
    <div id="notic" style=" text-align: center ;background-color: #ffdd94; border-color: #c3e6cb; color: #9F44D3; padding: 10px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
    
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('notic').style.display = 'none';
        }, 5000); 
    </script>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('home.header')

    <!-- Hero Section Begin -->
     @yield('section') 
    <!-- Hero Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                @yield('content')
                @include('home.topviewcomment')
            </div>
        </div>
    </section>
<!-- Product Section End -->

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