@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
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
                                    <th>Mã Anime</th>
                                    <th>ID blogs</th>
                                    <th>Trailer link</th>
                                    <th></th>

                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($ds))
                                @foreach ($ds as $item => $k)
                                <tr>
                                    <td style="text-align: center;">{{$k->MaAnime}}</td>
                                    <td style="text-align: center;"><img src="{{ $k->IDBlog }}" alt="Hình ảnh" width="50" height="50"></td>
                                    <td style="text-align: center;">{{$k->Trailer}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('#'.$k->ID)}}">Sửa</a>
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
                        {{$ds->links()}}
                    </div>
                </div>
            </div>    
                           
            
        </div>
    </div>

@endsection