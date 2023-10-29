@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Gói</h1>
    <form method="POST" action="{{ route('addgoi') }}">
        @csrf 
        <input type="text" class="form-control col-md-6" id="magoi" name="magoi" value="{{$ma}}" required style="visibility: hidden;">
        <div class="form-group">
            <label for="name">Thời gian sử dụng(Tháng)</label>
            <input type="number" class="form-control col-md-6" id="thoigiansd" name="thoigiansd" required>
        </div> 
        <div class="form-group">
            <label for="name">Giá</label>
            <input type="number" class="form-control col-md-6" id="gia" name="gia" required>
        </div>    
        <div class="form-group">
            <label for="name">Ghi chú</label>
            <input type="text" class="form-control col-md-6" id="ghichu" name="ghichu" >
        </div>          
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection