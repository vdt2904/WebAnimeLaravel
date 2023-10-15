<!DOCTYPE html>
<html>
<head>
    <title>Gói đăng kí</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Danh sách gói đăng kí</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Mã gói</th>
                    <th>Thời gian</th>
                    <th>Giá</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goi as $item)
                <tr>
                    <td>{{ $item->MaGoi }}</td>
                    <td>{{ $item->ThoiGianSD}}</td>
                    <td>{{ $item->Gia }}</td>
                    <td>{{ $item->GhiChu }}</td>
                </tr>
                @endforeach
            </tbody>
           
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $goi->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
                @foreach ($goi->getUrlRange(1, $goi->lastPage()) as $page => $url)
                    @if ($page == $goi->currentPage())
                        <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
                <li class="page-item">
                    <a class="page-link" href="{{ $goi->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    <div>
        <button><a href="{{Route('addregister')}}">Thêm gói đăng kí</a></button
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
