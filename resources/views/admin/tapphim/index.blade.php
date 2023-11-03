@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách tập phim</h6>
        <br/>
        <a class="btn btn-primary" href="{{url('/admin/tapphim/add')}}">Thêm</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 250%;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>Mã Tập phim</th>
                                    <th>Anime</th>
                                    <th>Tập</th>
                                    <th>Views</th>
                                    <th>Comments</th>
                                    <th>Ngày phát sóng</th>
                                    <th>Link video</th>
                                    <th>Linh nền</th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($ds))
                                @foreach ($ds as $item => $k)
                                <tr>
                                    <td style="text-align: center;">{{$k->MaTP}}</td>
                                    @php
                                        $ani = DB::table('tb_anime')->where('MaAnime',$k->MaAnime)->get();
                                        $anime = $ani->first()->Anime;
                                    @endphp
                                    <td style="text-align: center;">{{$anime}}</td>
                                    <td style="text-align: center;">{{$k->Tap}}</td>
                                    <td style="text-align: center;">{{$k->Views}}</td>
                                    <td style="text-align: center;">{{$k->Comments}}</td>
                                    <td style="text-align: center;">{{$k->NgayPhatSong}}</td>
                                    <td style="text-align: center;">{{$k->Video}}</td>
                                    <td style="text-align: center;">{{$k->NenVideo}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/tapphim/edit/'.$k->MaTP)}}">Sửa</a>
                                    </td>                                    
                                    
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Danh sách trống</td>
                                </tr>
                            @endif               
                            </tbody>
                        </table>
                        @if (!empty($ds))
                        {{$ds->links()}}
                        @endif
                    </div>
                </div>
            </div>    
                           
            
        </div>
    </div>

@endsection