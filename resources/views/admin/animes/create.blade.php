@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Thêm Anime</h1>
    <form method="POST" action="{{ route('animes.uploadanime') }}" enctype="multipart/form-data">
        @csrf 
        <input type="text" class="form-control col-md-6" id="maanime" name="maanime" value="{{$ma}}" style="visibility: hidden;">
        <div class="form-group">
            <label for="name">Tên Anime</label>
            <input type="text" class="form-control col-md-6" id="anime" name="anime" >
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <img id="imagePreview" src="" width="200" height="150" alt="Ảnh">
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" >
            @error('image')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <img id="imagePreview1" src="" width="200" height="150" alt="Ảnh Ngang">
            <input type="file" class="form-control-file" id="image1" name="image1" accept="image/*" >
            @error('image1')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="publish_date">Ngày Phát sóng</label>
            <input type="datetime-local" class="form-control col-md-6" id="publish_date" name="publish_date" >
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Tổng số tập</label>
            <input type="number" class="form-control col-md-6" id="tongsotap" name="tongsotap">
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="description">Hãng phim</label>
            <select name="mahp" id="mahp" class="form-control col-md-6" >
                <option value="">Lựa chọn</option>
                @foreach ($mahp as $item => $k)
                    <option value="{{$k->MaHP}}">{{$k->HangPhim}}</option>
                @endforeach
            </select>
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="description">Loại phim</label>
            <select name="malp" id="malp" class="form-control col-md-6" >
                <option value="">Lựa chọn</option>
                @foreach ($malp as $item => $k)
                    <option value="{{$k->MaLP}}">{{$k->LoaiPhim}}</option>
                @endforeach
            </select>
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div> 
        <div class="form-group">
            <label for="description">Loại</label>
            <select name="loai" id="loai" class="form-control col-md-6" >
                <option value="">Lựa chọn</option>
                <option value="0">Thường</option>
                <option value="1">Vip</option>
            </select>
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="description">Thông tin</label>
            <textarea class="form-control col-md-6" id="ThongTin" name="ThongTin" rows="3"></textarea>
        </div>
        <input type="text" class="form-control col-md-6" id="status" name="status" value="0"  style="visibility: hidden;">       
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
