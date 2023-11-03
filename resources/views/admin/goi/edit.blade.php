@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa Gói</h1>
    <form method="POST" action="{{ route('goi.updategoi') }}">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="name">Thời gian sử dụng</label>
            <input type="number" class="form-control col-md-6" id="thoigiansd" name="thoigiansd" value="{{$gdetail->ThoiGianSD}}" required>
        </div>    
        <div class="form-group">
            <label for="name">Giá</label>
            <input type="number" class="form-control col-md-6" id="gia" name="gia" value="{{$gdetail->Gia}}" required>
        </div>
        <div class="form-group">
            <label for="name">Ghi chứ</label>
            <input type="text" class="form-control col-md-6" id="ghichu" name="ghichu" value="{{$gdetail->GhiChu}}">
        </div>    
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection
