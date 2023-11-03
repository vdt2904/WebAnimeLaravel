@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Loại Phim</h1>
    <form method="POST" action="{{ route('addloaiphim') }}">
        @csrf 
        <input type="text" class="form-control col-md-6" id="malp" name="malp" value="{{$ma}}" required style="visibility: hidden;">
        <div class="form-group">
            <label for="name">Tên Loại phim</label>
            <input type="text" class="form-control col-md-6" id="loaiphim" name="loaiphim" required>
        </div>           
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection