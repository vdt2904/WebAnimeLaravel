@extends('AdminLayout')
@section('main')
    <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Quản lý hãng phim</h3>
            </div>
            <div class="col-md-6">
               <a href="{{url('admin/hangphim/create')}}" class="btn btn-primary float-end">Thêm mới</a>
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
                  <th>Mã Hãng Phim</th>
                  <th>Hãng Phim</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($hangphim as $item)
               <tr>
                  <td>{{ $item->MaHP }}</td>
                  <td>{{ $item->HangPhim }}</td>

                  <td>
                      <a href="{{ url('/admin/hangphim/edit'.'/' . $item->MaHP ) }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <form method="POST" action="{{ url('/admin/hangphim/destroy' . '/' . $item->MaHP) }}" accept-charset="UTF-8" style="display:inline">
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