@extends('AdminLayout')
@section('main')
    <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Sửa hãng phim phim</h3>
            </div>
         </div>
      </div>
      <div class="card-body">
            <form action="{{url('/admin/hangphim/update/'.$MaHP)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Mã HP</td>
                                <td><input type="text" name="MaHP" id="" value="{{$MaHP}}"></td>
                            </tr>
                            <tr>
                                <td>Hãng Phim</td>
                                <td><input type="text" name="HangPhim" id="" value="{{$hangphim->HangPhim}}"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
      </div>
    </div>
@endsection