@extends('AdminLayout')
@section('main')
    <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Quản lý thể loại phim</h3>
            </div>
            <div class="col-md-6">
               <a href="{{url('admin/theloai/create')}}" class="btn btn-primary float-end">Thêm mới</a>
            </div>
         </div>
      </div>
      <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger">
                  {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                  {{ session('success') }}
            </div>
        @endif

         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Mã Thể Loại</th>
                  <th>Thể Loại</th>
                  <th>Thông Tin</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($theloai as $item)
               <tr>
                  <td>{{ $item->MaTL }}</td>
                  <td>{{ $item->TheLoai }}</td>
                  <td>{{ $item->ThongTin }}</td>

                  <td>
                      <a href="{{ url('/admin/theloai/edit'.'/' . $item->MaTL ) }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <form method="POST" action="{{ url('/admin/theloai/destroy' . '/' . $item->MaTL) }}" accept-charset="UTF-8" style="display:inline">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger btn-sm" title="Delete " onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                      </form>
                  </td>
              </tr>
               @endforeach
            </tbody>    
         </table>
      </div>
    </div>
@endsection