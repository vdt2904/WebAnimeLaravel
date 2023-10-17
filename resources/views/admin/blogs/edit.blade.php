@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa Blogs</h1>
    <form method="POST" action="{{ route('Blogs.updateblogs') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="name">Tên blog</label>
            <input type="text" class="form-control col-md-6" id="name" name="name" value="{{$blogdetail->TenBlog}}" required>
        </div>
        <div class="form-group">
            <!-- <label for="image">Chọn Ảnh</label> -->
            <img id="imagePreview" src="{{$blogdetail->Anh}}" width="200" height="150" alt="Ảnh hiện tại">
            <input  type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>
        
        <div class="form-group">
            <label for="description">Thông tin</label>
            <textarea class="form-control col-md-6" id="ThongTin" name="ThongTin" rows="3" required>{{$blogdetail->ThongTin}}</textarea>
        </div>
        <div class="form-group">
            <label for="publish_date">Ngày Đăng</label>
            @php
                $ngayDang = date("Y-m-d\TH:i", strtotime($blogdetail->NgayDang));
            @endphp
            <input type="datetime-local" class="form-control col-md-6" id="publish_date" name="publish_date" value="{{$ngayDang}}" required>
        </div>        
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection
