@extends('AdminLayout')
@section('main')
    <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Thêm hãng phim</h3>
            </div>
         </div>
      </div>
      <div class="card-body">
            <form action="{{url('/admin/hangphim/store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Mã HP</td>
                                <td><input type="text" name="MaHP" id="" placeholder="Nhập mã hãng phim....."></td>
                            </tr>
                            <tr>
                                <td>Hãng Phim</td>
                                <td><input type="text" name="HangPhim" id="" placeholder="Nhập hãng phim....."></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Thêm</button>
            </form>
      </div>
    </div>
@endsection