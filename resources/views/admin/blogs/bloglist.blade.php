@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Bolgs</h6>
        <br/>
        <a class="btn btn-primary">Thêm</a>
    </div>
    <div class="card-body">
        <div class="table">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead style="text-align: center;">
                                <tr>
                                    <th>Blog</th>
                                    <th>Ảnh</th>
                                    <th>Thông tin</th>
                                    <th>Ngày dăng</th>
                                    <th></th>

                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($userslist1))
                                @foreach ($userslist1 as $item => $k)
                                <tr>
                                    <td style="text-align: center;">{{$k->TenBlog}}</td>
                                    <td style="text-align: center;"><img src="{{ $k->Anh }}" alt="Hình ảnh" width="50" height="50"></td>
                                    <td style="text-align: center;">{{$k->ThongTin}}</td>
                                    <td style="text-align: center;">{{$k->NgayDang}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/blogs/edit/'.$k->IDBlog)}}">Sửa</a>
                                        <a class="fas fa-trash-alt text-danger" href="#"></a>
                                    </td>                                    
                                    
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Không có blog nào</td>
                                </tr>
                            @endif               
                            </tbody>
                        </table>
                        {{$userslist1->links()}}
                    </div>
                </div>
            </div>    
                           
            
        </div>
    </div>

@endsection