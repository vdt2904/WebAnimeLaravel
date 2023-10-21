@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa thể loại</h1>
    <form method="POST" action="{{ route('theloai.updatetheloai') }}">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="name">Tên Thể loại</label>
            <input type="text" class="form-control col-md-6" id="theloai" name="theloai" value="{{$tldetail->TheLoai}}" required>
        </div> 
        <div class="form-group">
            <label for="description">Thông tin</label>
            <textarea class="form-control col-md-6" id="ThongTin" name="ThongTin" rows="3" required>{{$tldetail->ThongTin}}</textarea>
        </div>      
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection
