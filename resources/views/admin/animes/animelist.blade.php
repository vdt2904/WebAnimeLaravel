@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Anime</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Mã Anime</th>
                                    <th rowspan="1" colspan="1">Tên Anime</th>
                                    <th rowspan="1" colspan="1">Ảnh</th>
                                    <th rowspan="1" colspan="1">Ngày phát sóng</th>
                                    <th rowspan="1" colspan="1">Hãng phim</th>
                                    <th rowspan="1" colspan="1">Tổng số tập</th>
                                    <th rowspan="1" colspan="1">Loại phim</th>
                                    <th rowspan="1" colspan="1">Ghi chú</th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($userslist1))
                                @foreach ($userslist1 as $item => $k)
                                <tr class="odd">
                                    <td>{{$k->MaAnime}}</td>
                                    <td>{{$k->Anime}}</td>
                                    <td>{{$k->Anh}}</td>
                                    <td>{{$k->NgayPhatSong}}</td>
                                    <td>{{$k->MaHP}}</td>
                                    <td>{{$k->TongSoTap}}</td>
                                    <td>{{$k->LoaiPhim}}</td>
                                    <td>{{$k->LP}}</td>
                                    <td>
                                        <a class="fas fa-pencil-alt text-primary" href="#"></a>
                                    </td>                                    
                                    <td>
                                        <a class="fas fa-trash-alt text-danger" href="#"></a>
                                    </td>
                                    
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Không có Anime</td>
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