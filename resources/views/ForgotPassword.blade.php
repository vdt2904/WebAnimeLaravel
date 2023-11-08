<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Forgot Password</title>
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
    <!-- Header Section Begin -->
    @include('home.header')
    <!-- Header End -->
    <!-- Login Section Begin -->
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-container">
                        <h2>Forgot Password</h2>
                        @if (isset($errors) && $errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('SendEmail') }}" method="post">
                            @csrf
                            <label for="email">Your email : </label><br>
                            <input type="email" id="email" name="Email" required><br><br>
                            <button type="submit" class="btn-submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .login {
            text-align: center;
        }

        .form-container {
            width: 50%;
            margin: auto;
            padding: 40px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
        }

        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button[type="submit"] {
            width: 100%;
            padding: 5px;
            background-color: #B660cd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .alert {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert ul {
            padding-left: 20px;
            list-style: none;
        }

        .alert li {
            margin-bottom: 10px;
        }
    </style>
    <!-- Login Section End -->

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
