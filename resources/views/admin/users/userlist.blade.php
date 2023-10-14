@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Người Dùng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Mã người dùng</th>
                                    <th rowspan="1" colspan="1">Tên người dùng</th>
                                    <th rowspan="1" colspan="1">Email</th>
                                    <th rowspan="1" colspan="1">Số điện thoại</th>
                                    <th rowspan="1" colspan="1">Mật khẩu</th>
                                    <th rowspan="1" colspan="1">Loại</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($userslist1))
                                @foreach ($userslist1 as $item => $k)
                                <tr class="odd">
                                    <td>{{$k->MaND}}</td>
                                    <td>{{$k->TenND}}</td>
                                    <td>{{$k->Email}}</td>
                                    <td>{{$k->SDT}}</td>
                                    <td>{{$k->Password}}</td>
                                    <td>{{$k->LoaiND}}</td>

                                    <td>
                                        <a class="fas fa-trash-alt text-danger" href="#"></a>
                                    </td>
                                    
                                    
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Không có người dùng</td>
                                </tr>
                            @endif               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
                           
            
        </div>
    </div>

@endsection