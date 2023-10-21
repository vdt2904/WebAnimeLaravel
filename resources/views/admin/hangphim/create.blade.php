@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Hãng Phim</h1>
    <form method="POST" action="{{ route('addhangphim') }}">
        @csrf 
        <input type="text" class="form-control col-md-6" id="mahp" name="mahp" value="{{$ma}}" required style="visibility: hidden;">
        <div class="form-group">
            <label for="name">Tên Hãng phim</label>
            <input type="text" class="form-control col-md-6" id="hangphim" name="hangphim" required>
        </div>           
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection