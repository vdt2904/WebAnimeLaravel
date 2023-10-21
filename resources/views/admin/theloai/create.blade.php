@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Thể loại</h1>
    <form method="POST" action="{{ route('addtheloai') }}">
        @csrf 
        <input type="text" class="form-control col-md-6" id="matl" name="matl" value="{{$ma}}" required style="visibility: hidden;">
        <div class="form-group">
            <label for="name">Tên Thể loại</label>
            <input type="text" class="form-control col-md-6" id="theloai" name="theloai" required>
        </div>       
        <div class="form-group">
            <label for="description">Thông tin</label>
            <textarea class="form-control col-md-6" id="ThongTin" name="ThongTin" rows="3" required></textarea>
        </div>      
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection