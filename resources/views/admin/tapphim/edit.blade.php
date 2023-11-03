@extends('AdminLayout') 

@section('main')
<div class="container">
    <h1>Sửa tập phim</h1>
    <form method="POST" action="{{ route('tapphim.updatetapphim') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf       
        <div class="form-group">
            <label for="description">Anime</label>
            <input type="text" class="form-control col-md-6" id="anime" value="{{$maanime[0]->Anime}}" readonly>
            <input type="hidden" id="maanime" name="maanime" value="{{$maanime[0]->MaAnime}}">
        </div>  
        <div class="form-group">
            <label for="name">Tập</label>
            <input type="number" class="form-control col-md-6" id="tap" name="tap" value="{{$tpdetail->Tap}}" required>
        </div>
        <div class="form-group" style="display: none;">
            <input type="number" class="form-control col-md-6" id="views" name="views" value="{{$tpdetail->Views}}" required>
        </div>
        <div class="form-group" style="display: none;">
            <input type="number" class="form-control col-md-6" id="comments" name="comments" value="{{$tpdetail->Comments}}" required>
        </div>
        <div class="form-group">
            <label for="publish_date">Ngày Phát Sóng</label>
            @php
                $ngayDang = date("Y-m-d\TH:i", strtotime($tpdetail->NgayPhatSong));
            @endphp
            <input type="datetime-local" class="form-control col-md-6" id="publish_date" name="publish_date" value="{{$ngayDang}}" required>
        </div> 
        <div class="form-group">
            <label for="video">Trailer</label>
            <input type="file" class="form-control-file" id="video" name="video" accept="video/*">
            <p id="trailerLink">Link cũ: <a href="{{$tpdetail->Video}}" >{{$tpdetail->Video}}</a></p>            
        </div>
        <div class="form-group">
            <img id="imagePreview" src="{{$tpdetail->NenVideo}}" width="200" height="150" alt="Ảnh hiện tại">
            <input  type="file" class="form-control-file" id="image" name="image" accept="image/*">
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
