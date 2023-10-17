@extends('AdminLayout')
@section('main')
    <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Sửa thể loại phim</h3>
            </div>
         </div>
      </div>
      <div class="card-body">
            <form action="{{url('/admin/theloai/update/'.$MaTL)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Mã TL</td>
                                <td><input type="text" name="MaTL" id="" value="{{$MaTL}}"></td>
                            </tr>
                            <tr>
                                <td>Thể loại</td>
                                <td><input type="text" name="TheLoai" id="" value="{{$theloai->TheLoai}}"></td>
                            </tr>
                            <tr>
                                <td>Thông tin</td>
                                <td><input type="text" name="ThongTin" id="" value="{{$theloai->ThongTin}}"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
      </div>
    </div>
@endsection