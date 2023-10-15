<!DOCTYPE html>
<html>
<head>
    <title>Thêm Gói Đăng Kí Mới</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Thêm Gói Đăng Kí Mới</h2>
    <form method="post" action="/goi" class="mt-4">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="MaGoi" placeholder="Mã gói">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="ThoiGianSD" placeholder="Thời gian sử dụng">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="Gia" placeholder="Giá">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="GhiChu" placeholder="Ghi chú">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Gói Đăng Kí</button>
    </form>

    <!-- Add Bootstrap JS files (jQuery and Popper.js are required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
