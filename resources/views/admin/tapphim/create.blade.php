@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm tập phim</h1>
    <form method="POST" action="{{ route('addtapphim') }}" enctype="multipart/form-data">
        @csrf 
        <input type="text" class="form-control col-md-6" id="matp" name="matp" value="{{$ma}}" required style="visibility: hidden;">
        <div class="form-group">
            <label for="description">Anime</label>
            <select name="maanime" id="maanime" class="form-control col-md-6" required >
                <option value="">Lựa chọn</option>
                @foreach ($maanime as $item => $k)
                    <option value="{{$k->MaAnime}}">{{$k->Anime}}</option>
                @endforeach
              </select>
        </div> 
        <div class="form-group">
            <label for="name">Tập</label>
            <input type="number" class="form-control col-md-6" id="tap" name="tap" required>
        </div>
        <div class="form-group" style="display: none;">
            <input type="number" class="form-control col-md-6" id="views" name="views" value="0" required>
        </div>
        <div class="form-group" style="display: none;">
            <input type="number" class="form-control col-md-6" id="comments" name="comments" value="0" required>
        </div>        
        <div class="form-group">
            <label for="publish_date">Ngày Phát sóng</label>
            <input type="datetime-local" class="form-control col-md-6" id="publish_date" name="publish_date" required>
        </div>
        <div class="form-group">
            <label for="video">Video</label>
            <input type="file" class="form-control-file" id="video" name="video" accept="video/*" required>
        </div>
        <div class="form-group">
            <label for="image">Ảnh nền</label>
            <img id="imagePreview" src="" width="200" height="150" alt="Ảnh hiện tại">
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>         
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
