@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa</h1>
    <form method="POST" action="{{ route('bloganime.updateblogani') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label for="description">Anime</label>
            <select name="maanime" id="maanime" class="form-control col-md-6" required>
                <option value="">Lựa chọn</option>
                @foreach ($maanime as $item => $k)
                    @if ($k->MaAnime == $anibdetail->MaAnime)
                        <option value="{{$k->MaAnime}}" selected>{{$k->Anime}}</option>
                    @else
                        <option value="{{$k->MaAnime}}">{{$k->Anime}}</option>
                    @endif
                @endforeach
              </select>
        </div> 
        <div class="form-group">
            <label for="description">Blogs</label>
            <select name="idblog" id="idblog" class="form-control col-md-6" required>
                <option value="">Lựa chọn</option>
                @foreach ($idblog as $item => $k)
                    @if ($k->IDBlog == $anibdetail->IDBlog)
                        <option value="{{$k->IDBlog}}" selected>{{$k->TenBlog}}</option>
                    @else
                        <option value="{{$k->IDBlog}}">{{$k->TenBlog}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <label for="video">Trailer</label>
            <input type="file" class="form-control-file" id="video" name="video" accept="video/*">
            <p id="trailerLink">Link cũ: <a href="{{$anibdetail->Trailer}}" >{{$anibdetail->Trailer}}</a></p>
            
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    // Lấy tham chiếu đến các phần tử HTML cần xử lý
    var videoInput = document.getElementById('video');
    var trailerLink = document.getElementById('trailerLink');

    // Gắn sự kiện 'change' cho trường nhập tệp
    videoInput.addEventListener('change', function () {
        // Kiểm tra xem đã chọn tệp hay chưa
        if (videoInput.files.length > 0) {
            // Ẩn thẻ <a> khi có tệp được chọn
            trailerLink.style.display = 'none';
        }
    });
});
</script>
@endsection
