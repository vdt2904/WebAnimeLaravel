@extends('AdminLayout')
@section('main')
    <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Thêm thể loại phim</h3>
            </div>
         </div>
      </div>
      <div class="card-body">
            <form action="{{url('/admin/theloai/store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Mã TL</td>
                                <td><input type="text" name="MaTL" id="" placeholder="Nhập mã thể loại....."></td>
                            </tr>
                            <tr>
                                <td>Thể loại</td>
                                <td><input type="text" name="TheLoai" id="" placeholder="Nhập thể loại....."></td>
                            </tr>
                            <tr>
                                <td>Thông tin</td>
                                <td><input type="text" name="ThongTin" id="" placeholder="Nhập thông tin....."></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Thêm</button>
            </form>
      </div>
    </div>
@endsection