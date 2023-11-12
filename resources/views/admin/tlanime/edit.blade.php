@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa thể loại</h1>
    <form method="POST" action="{{ route('tlanime.updatetla') }}">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="description">Anime</label>
            <select name="maanime" id="maanime" class="form-control col-md-6" required>
                <option value="">Lựa chọn</option>
                @foreach ($ani as $item => $k)
                    @if ($k->MaAnime == $tladetail->MaAnime)
                    <option value="{{$k->MaAnime}}" selected>{{$k->Anime}}</option>
                    @else
                        <option value="{{$k->MaAnime}}">{{$k->Anime}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <label for="description">Thể loại</label>
            <select name="matl" id="matl" class="form-control col-md-6" required>
                <option value="">Lựa chọn</option>
                @foreach ($tl as $item => $k)
                    @if ($k->MaTL == $tladetail->MaTL)
                    <option value="{{$k->MaTL}}" selected>{{$k->TheLoai}}</option>
                    @else
                        <option value="{{$k->MaTL}}">{{$k->TheLoai}}</option>
                    @endif
                @endforeach
              </select>
        </div>  
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection