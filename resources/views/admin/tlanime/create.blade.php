@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Thể loại cho Anime</h1>
    <form method="POST" action="{{ route('addtla') }}">
        @csrf 
        <div class="form-group">
            <label for="description">Anime</label>
            <select name="maanime" id="maanime" class="form-control col-md-6" required>
                <option value="">Lựa chọn</option>
                @foreach ($ani as $item => $k)
                    <option value="{{$k->MaAnime}}">{{$k->Anime}}</option>
                @endforeach
              </select>
        </div>        
        <div class="form-group">
            <label for="description">Thể loại</label>
            <select name="matl" id="matl" class="form-control col-md-6" required>
                <option value="">Lựa chọn</option>
                @foreach ($tl as $item => $k)
                    <option value="{{$k->MaTL}}">{{$k->TheLoai}}</option>
                @endforeach
              </select>
        </div>      
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection