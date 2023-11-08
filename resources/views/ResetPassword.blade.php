<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Reset Password </title>
    <link rel="icon" href="/Home/img/icon.jpg" type="image/png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                        <h2>Reset Password</h2>
                        @if (isset($errors) && $errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('ResetPassword') }}" method="post">
                            @csrf
                            <div class="password-container">
                                <label for="password">Password : </label>
                                <div class="input-container">
                                    <input type="password" id="password" name="password" required>
                                    <i class="fa fa-eye" aria-hidden="true" onmouseover="showPassword()"></i>
                                </div>
                            </div>
                            <br><br>
                            <div class="password-container">
                                <label for="confirmpassword">Confirm password : </label>
                                <div class="input-container">
                                    <input type="password" id="confirmpassword" name="confirmpassword" required>
                                    <i class="fa fa-eye" aria-hidden="true" onmouseover="showConfirmPassword()"></i>
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn-submit">Change password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showPassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function showConfirmPassword() {
            var confirmPasswordField = document.getElementById("confirmpassword");
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
            } else {
                confirmPasswordField.type = "password";
            }
        }
    </script>
    <style>
        .password-icon {
            position: relative;
        }

        .password-icon i {
            position: absolute;
            right: 10px;
            top: 45%;
            transform: translateY(-50%);
            cursor: pointer;
        }
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

      
        .input-container {
        position: relative;
      margin-bottom: 20px;
}

.input-container input {
    width: 100%;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.input-container i {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
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
