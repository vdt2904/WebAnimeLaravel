@extends('AdminLayout')
@section('main')
@php
    use Illuminate\Support\Facades\DB;
@endphp
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Hóa đơn</h6>
        <br/>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 150%;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>ID</th>
                                    <th>Người dùng</th>
                                    <th>Gói</th>
                                    <th>Ngày mua</th>
                                </tr>
                            </thead>    
                            <tbody>
                            @if (!empty($data))
                                @foreach ($data as $item => $k)
                                <tr>
                                    @php
                                        $nd = DB::table('tb_nguoidung')->where('MaND',$k->MaND)->get();
                                        $nguoidung = $nd->first()->Email;
                                    @endphp
                                    <td style="text-align: center;">{{$k->MaTT}}</td>
                                    <td style="text-align: center;">{{$nguoidung}}</td>
                                    <td style="text-align: center;">{{$k->MaGoi}}</td>
                                    <td style="text-align: center;">{{$k->NgayMua}}</td>
                                </tr>                       
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center">Danh sách trống</td>
                                </tr>
                            @endif               
                            </tbody>
                        </table>
                        @if (!empty($data))
                        {{$data->links()}}
                        @endif
                    </div>
                </div>
            </div>    
                           
            
        </div>
    </div>

@endsection