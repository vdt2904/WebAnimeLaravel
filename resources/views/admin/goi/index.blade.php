@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Gói</h6>
        <br>
        <a class="btn btn-primary" href="{{url('/admin/goi/add')}}">Thêm</a>
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
                                    <th rowspan="1" colspan="1">Mã Gói</th>
                                    <th rowspan="1" colspan="1">Thời gian sử dụng</th>
                                    <th rowspan="1" colspan="1">Giá</th>
                                    <th rowspan="1" colspan="1">Ghi chú</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($ds))
                                @foreach ($ds as $item => $k)
                                <tr class="odd">
                                    <td>{{$k->MaGoi}}</td>
                                    <td>{{$k->ThoiGianSD}}</td>
                                    <td>{{$k->Gia}}</td>
                                    <td>{{$k->GhiChu}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/goi/edit/'.$k->MaGoi)}}">Sửa</a>
                                        <form action="{{ url('admin/deleteg/'.$k->MaGoi) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>                                                                       
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Không có gói nào</td>
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