@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Blogs</h1>
    <form method="POST" action="{{ route('Blogs.uploadblogs') }}" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
            <label for="name">Tên Blogs</label>
            <input type="text" class="form-control col-md-6" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="image">Chọn Ảnh</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        
        <div class="form-group">
            <label for="description">Thông tin</label>
            <textarea class="form-control col-md-6" id="ThongTin" name="ThongTin" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="publish_date">Ngày Đăng</label>
            <input type="datetime-local" class="form-control col-md-6" id="publish_date" name="publish_date" required>
        </div>        
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
