@extends('AdminLayout')
@section('main')
@php
    use Illuminate\Support\Facades\DB;
@endphp
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thể loại cho Anime</h6>
        <br/>
        <a class="btn btn-primary" href="{{url('/admin/tlanime/add')}}">Thêm</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>ID</th>
                                    <th>Anime</th>
                                    <th>Thể loại</th>
                                    <th></th>

                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($ds))
                                @foreach ($ds as $item => $k)
                                <tr>
                                    @php
                                        $ani = DB::table('tb_anime')->where('MaAnime',$k->MaAnime)->get();
                                        $anime = $ani->first()->Anime;
                                        $tl = DB::table('tb_theloai')->where('MaTL',$k->MaTL)->get();
                                        $theloai = $tl->first()->TheLoai;
                                    @endphp
                                    <td style="text-align: center;">{{$k->ID}}</td>
                                    <td style="text-align: center;">{{$anime}}</td>
                                    <td style="text-align: center;">{{$theloai}}</td>
                                    
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/tlanime/edit/'.$k->ID)}}">Sửa</a>
                                        <form action="{{ url('#'.$k->ID) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        
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