@extends('AdminLayout')
@section('main')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
        <br/>
        <a class="btn btn-primary" href="{{url('/admin/bloganime/add')}}">Thêm</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 150%;">
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
                                    <td style="text-align: center;">{{$k->IDBlog}}</td>
                                    <td style="text-align: center;">{{$k->Trailer}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('/admin/bloganime/edit/'.$k->ID)}}">Sửa</a>
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