<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Sign up</title>

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
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
@include('home.header')
<!-- Header End -->
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign Up</h2>
                    <p>Welcome to the official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
                <div class="login__form">
                    <h3>Sign Up</h3>
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    <form method="POST" action="{{ route('adduser') }} ">
                        @csrf
                        <div class="input__item">
                            <input type="text" name="Email" placeholder="Email">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" name="TenND" placeholder="TenND">
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <input type="password" id="password" name="Password" placeholder="Password"
                                class="password-input">
                            <span class="toggle-password" onclick="togglePasswordVisibility()"><i
                                    class="fa fa-eye"></i></span>
                        </div>
                        <div class="input__item">
                            <input type="password" id="cfpassword" name="CFPassword" placeholder="confirm Password"
                                class="password-input">
                            <span class="toggle-password" onclick="togglePasswordVisibility1()"><i
                                    class="fa fa-eye"></i></span>
                        </div>

                        <div class="input__item">
                            <input type="text" name="SDT" placeholder="SDT">
                            <span class="icon_phone"></span>
                        </div>
                        <div class="col-lg-6">
                           
                        <button type="submit" class="site-btn">Register</button>
                    </form>
                    <h5>Already have an account? <a href="#">Log In!</a></h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__social__links">
                    <h3>Login With:</h3>
                    <ul>
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                        </li>
                        <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');

        var eyeIcon = document.querySelector('.toggle-password i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    function togglePasswordVisibility1() {
        var CFpasswordInput = document.getElementById('cfpassword');
        var eyeIcon1 = document.querySelectorAll('.toggle-password')[1].querySelector('i');

        if (CFpasswordInput.type === 'password') {
            CFpasswordInput.type = 'text';
            eyeIcon1.classList.remove('fa-eye');
            eyeIcon1.classList.add('fa-eye-slash');
        } else {
            CFpasswordInput.type = 'password';
            eyeIcon1.classList.remove('fa-eye-slash');
            eyeIcon1.classList.add('fa-eye');
        }
    }
</script>
<!-- Signup Section End -->
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
