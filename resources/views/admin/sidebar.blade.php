<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý Anime
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <span>Quản lý phim</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/admin/animes')}}">Anime</a>
                <a class="collapse-item" href="cards.html">Tập Phim</a>
                <a class="collapse-item" href="{{url('/admin/theloai')}}">The loai</a>               
                <a class="collapse-item" href="cards.html">The loai của phim</a>
                <a class="collapse-item" href="{{url('/admin/hangphim')}}">Hãng phim</a>
                <a class="collapse-item" href="{{url('/admin/loaiphim')}}">Loại phim</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <span>Quản lý Blog</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/admin/blogs')}}">Blogs</a>
                <a class="collapse-item" href="{{url('/admin/bloganime')}}">Trailer</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý người dùng
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <span>Quản lý tài khoản</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/goi')}}">
            <span>Quản lý gói cước</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <span>Quản lý hóa đơn thanh toán</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>