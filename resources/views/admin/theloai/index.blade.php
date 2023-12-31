@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thể Loại</h6>
        <br>
        <a class="btn btn-primary" href="{{url('/admin/theloai/add')}}">Thêm</a>
    </div>
    <div class="card-body">
        <div class="table">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Mã Thể loại</th>
                                    <th rowspan="1" colspan="1">Thể loại</th>
                                    <th rowspan="1" colspan="1">Thông tin</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($ds))
                                @foreach ($ds as $item => $k)
                                <tr class="odd">
                                    <td>{{$k->MaTL}}</td>
                                    <td>{{$k->TheLoai}}</td>
                                    <td>{{$k->ThongTin}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/theloai/edit/'.$k->MaTL)}}">Sửa</a>
                                        <a class="fas fa-trash-alt text-danger" href="#"></a>
                                    </td>                                                                       
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Không có thể loại nào</td>
                                </tr>
                            @endif               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
                           
            {{$ds->links()}}
        </div>
    </div>

@endsection