<!DOCTYPE html>
<html lang="zxx">

<head>
   
        <meta charset="UTF-8">
        <meta name="description" content="Anime Template">
        <meta name="keywords" content="Anime, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Anime | Contact us</title>
        <link rel="icon" href="Home/img/icon.jpg" type="image/png">
        <!-- Google Font -->
        
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
    </head>

<body>
    <!-- Phần header tương tự -->
    @include('home.header')
    <!-- Phần liên hệ tùy chỉnh hơn -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__text">
                        <h3 style="color: white">Liên hệ với chúng tôi</h3>
                        <p style="color: white">Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ, hãy liên hệ với chúng tôi bằng cách điền vào khung bên dưới. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.</p>
                    </div>
                    <form action="/send_email" method="post">
                        <textarea name="message" placeholder="Nội dung phản hồi" class="custom-textarea" required></textarea>

                        <button type="submit" class="site-btn">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
     <!-- Blog Section End -->
    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->
    <!-- Search model Begin -->
    @include('home.search')
    <!-- Search model end -->
   <!-- Js Plugins -->

    @include('home.script')
<style>
    /* CSS */
.custom-textarea {
    width: 100%;
    height: 150px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
    resize: none;
    box-sizing: border-box;
}

.custom-textarea:focus {
    border-color: #4e73df;
}

</style>
</body>

</html>
