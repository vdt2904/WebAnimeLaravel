@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa Loại Phim</h1>
    <form method="POST" action="{{ route('loaiphim.updateloaiphim') }}">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="name">Tên Hãng phim</label>
            <input type="text" class="form-control col-md-6" id="loaiphim" name="loaiphim" value="{{$lpdetail->LoaiPhim}}" required>
        </div>     
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection