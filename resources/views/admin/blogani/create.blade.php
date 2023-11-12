@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm trailer</h1>
    @if ($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif
    <form method="POST" action="{{ route('bloganime.uploadbloganime') }}" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
            <label for="description">Anime</label>
            <select name="maanime" id="maanime" class="form-control col-md-6" >
                <option value="">Lựa chọn</option>
                @foreach ($maanime as $item => $k)
                    <option value="{{$k->MaAnime}}">{{$k->Anime}}</option>
                @endforeach
              </select>
              @error('maanime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div> 
        <div class="form-group">
            <label for="description">Blogs</label>
            <select name="idblog" id="idblog" class="form-control col-md-6" >
                <option value="">Lựa chọn</option>
                @foreach ($idblog as $item => $k)
                    <option value="{{$k->IDBlog}}">{{$k->TenBlog}}</option>
                @endforeach
              </select>
              @error('idblog')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="video">Video</label>
            <input type="file" class="form-control-file" id="video" name="video" accept="video/*">
            @error('video')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>       
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
