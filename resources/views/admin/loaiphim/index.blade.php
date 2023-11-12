@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Loại Phim</h6>
        <br>
        <a class="btn btn-primary" href="{{url('/admin/loaiphim/add')}}">Thêm</a>
    </div>
    @if(session('successMsg'))
        <div class="alert alert-success">
            {{ session('successMsg') }}
        </div>
    @endif
    @if(session('msg'))
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Mã Loại Phim</th>
                                    <th rowspan="1" colspan="1">Loại Phim</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($ds))
                                @foreach ($ds as $item => $k)
                                <tr class="odd">
                                    <td>{{$k->MaLP}}</td>
                                    <td>{{$k->LoaiPhim}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/loaiphim/edit/'.$k->MaLP)}}">Sửa</a>
                                        <form action="{{ url('admin/deletelp/'.$k->MaLP) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>                                                                       
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Không có loại phim nào</td>
                                </tr>
                            @endif               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
            @if (!empty($ds))
            {{$ds->links()}}         
            @endif
        </div>
    </div>

@endsection