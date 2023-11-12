@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa Anime</h1>
    @if ($errors->has('error'))
        <div class="alert alert-danger col-md-6">
            {{ $errors->first('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('animes.updateanime') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="name">Tên Anime</label>
            <input type="text" class="form-control col-md-6" id="anime" name="anime" value="{{$anidetail->Anime}}">
            @error('anime')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <!-- <label for="image">Chọn Ảnh</label> -->
            <img id="imagePreview" src="{{$anidetail->Anh}}" width="200" height="150" alt="Ảnh hiện tại">
            <input  type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="description">Hãng phim</label>
            <select name="mahp" id="mahp" class="form-control col-md-6">
                <option value="">Lựa chọn</option>
                @foreach ($mahp as $item => $k)
                    @if ($k->MaHP == $anidetail->MaHP)
                    <option value="{{$k->MaHP}}" selected>{{$k->HangPhim}}</option>
                    @else
                        <option value="{{$k->MaHP}}">{{$k->HangPhim}}</option>
                    @endif
                @endforeach
              </select>
              @error('mahp')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="description">Loại phim</label>
            <select name="malp" id="malp" class="form-control col-md-6">
                <option value="">Lựa chọn</option>
                @foreach ($malp as $item => $k)
                    @if ($k->MaLP == $anidetail->MaLP)
                        <option value="{{$k->MaLP}}" selected>{{$k->LoaiPhim}}</option>
                    @else
                        <option value="{{$k->MaLP}}">{{$k->LoaiPhim}}</option>
                    @endif
                @endforeach
              </select>
              @error('malp')
              <span style="color: red">{{$message}}</span>
          @enderror
        </div> 
        <div class="form-group">
            <label for="description">Loại</label>
            <select name="loai" id="loai" class="form-control col-md-6">
                <option value="">Lựa chọn</option>
                @if ($anidetail->LP == 0)
                <option value="0" selected>Thường</option>
                <option value="1">Vip</option>
                @else
                <option value="0" >Thường</option>
                <option value="1" selected>Vip</option>
                @endif               
              </select>
              @error('loai')
              <span style="color: red">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="description">Trạng Thái</label>
            <select name="status" id="status" class="form-control col-md-6">
                <option value="">Lựa chọn</option>
                @if ($anidetail->LP == 0)
                <option value="0" selected>Chưa hoàn thành</option>
                <option value="1">Đã hoàn thành</option>
                @else
                <option value="0" >Chưa hoàn thành</option>
                <option value="1" selected>Đã hoàn thành</option>
                @endif               
              </select>
              @error('status')
              <span style="color: red">{{$message}}</span>
          @enderror
        </div>      
        <div class="form-group">
            <label for="publish_date">Ngày Phát Sóng</label>
            @php
                $ngayDang = date("Y-m-d\TH:i", strtotime($anidetail->NgayPhatSong));
            @endphp
            <input type="datetime-local" class="form-control col-md-6" id="publish_date" name="publish_date" value="{{$ngayDang}}">
            @error('publish_date')
            <span style="color: red">{{$message}}</span>
        @enderror
        </div>  
        <div class="form-group">
            <label for="description">Thông tin</label>
            <textarea class="form-control col-md-6" id="ThongTin" name="ThongTin" rows="3">{{$anidetail->ThongTin}}</textarea>
        </div>      
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection
