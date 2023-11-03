@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Anime</h6>
        <br>
        <a class="btn btn-primary" href="{{url('/admin/animes/add')}}">Thêm</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 150%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Mã Anime</th>
                                    <th rowspan="1" colspan="1">Tên Anime</th>
                                    <th rowspan="1" colspan="1">Ảnh</th>
                                    <th rowspan="1" colspan="1">Ngày phát sóng</th>
                                    <th rowspan="1" colspan="1">Tổng số tập</th>
                                    <th rowspan="1" colspan="1">Hãng phim</th>
                                    <th rowspan="1" colspan="1">Loại phim</th>
                                    <th rowspan="1" colspan="1">Loại</th>
                                    <th rowspan="1" colspan="1">Trạng thái</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($userslist1))
                                @foreach ($userslist1 as $item => $k)
                                <tr class="odd">
                                    <td>{{$k->MaAnime}}</td>
                                    <td>{{$k->Anime}}</td>
                                    <td><img src="{{ $k->Anh }}" alt="Hình ảnh" width="50" height="50"></td>
                                    <td>{{$k->NgayPhatSong}}</td>
                                    <td>{{$k->TongSoTap}}</td>
                                    @php
                                        $hp = DB::table('tb_hangphim')->where('MaHP',$k->MaHP)->get();
                                        $hangPhim = $hp->first()->HangPhim;
                                        $lp = DB::table('tb_loaiphim')->where('MaLP',$k->MaLP)->get();
                                        $loaiphim = $lp->first()->LoaiPhim;
                                    @endphp
                                    <td>{{$hangPhim}}</td>
                                    <td>{{$loaiphim}}</td>
                                    @if($k->LP == 1)
                                    <td>
                                        <button class="btn btn-success" type="button">Vip</button>
                                    </td>
                                    @else
                                    <td>
                                        <button class="btn btn-secondary" type="button">Thuong</button>
                                    </td>
                                    @endif
                                    @if($k->status == 1)
                                    <td>
                                        <button class="btn btn-success" type="button">Đã hoàn thành</button>
                                    </td>
                                    @else
                                    <td>
                                        <button class="btn btn-secondary" type="button">Chưa hoàn thành</button>
                                    </td>
                                    @endif
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/animes/edit/'.$k->MaAnime)}}">Sửa</a>
                                        <a class="btn btn-danger" href="#">Xóa</a>
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
            @if(!empty($userslist1))
                {{$userslist1->links()}}
            @endif
        </div>
    </div>

@endsection