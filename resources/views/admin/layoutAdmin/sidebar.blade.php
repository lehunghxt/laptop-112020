<?php $url =  url()->current(); ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-beam"></i> --}}
            <i class="fab fa-airbnb"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(preg_match("/dashboard/i",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{(preg_match("/config/i",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('admin/list-configs') }}">
            <i class="fas fa-cogs"></i>
            <span>Cấu hình</span></a>
    </li>
    <li class="nav-item {{(preg_match("/categor/i",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('admin/list-categories') }}">
            <i class="fas fa-box"></i>
            <span>Hãng Laptop</span></a>
    </li>

    <li class="nav-item {{(preg_match("/produc/i",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('admin/list-products') }}">
            <i class="fas fa-id-badge"></i>
            <span>Danh Sách Laptop</span></a>
    </li>
    <li class="nav-item {{(preg_match("/custome/i",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('admin/customers') }}">
            <i class="fas fa-user-friends"></i>
            <span>Khách Hàng</span></a>
    </li>
    <li class="nav-item {{(preg_match("/order/",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('admin/orders') }}">
            <i class="fas fa-chart-area"></i>
            <span>Đơn Hàng</span></a>
    </li>
    <li class="nav-item {{(preg_match("/delivered/",$url))?'active':''}}">
        <a class="nav-link" href="{{ url('admin/delivered') }}">
            <i class="fas fa-chart-area"></i>
            <span>Đơn Hàng Đã Giao</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
