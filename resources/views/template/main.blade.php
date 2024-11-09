<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENGJUDSI</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    {{-- data tables --}}

    {{--  --}}

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i><span class="d-none d-md-inline ml-2">Sistem Informasi Pengajuan Judul Skripsi</span></a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="brand-link">
            <span class="brand-text font-weight-light">SIPENGJUDSI</span>
            <p class="text-sm brand-text">Welcome, <strong>{{ Auth::user()->nama }}</strong> ! <br> Role : <strong>{{ Auth::user()->role }}</strong></p>
        </div>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'dokter')
                    <li class="nav-item">
                        <a href="{{ route('dokter.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>Data Konsultasi</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'kasir')
                    <li class="nav-item">
                        <a href="{{ route('kasir.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>Data Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kasir.rekapitulasi') }}" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>Rekapitulasi</p>
                        </a>
                    </li>
                    @endif
                    {{-- @if (Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'superadmin')
                    <li class="nav-item">
                        <a href="{{ route('judul') }}" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>Pengajuan Judul</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'prodi' || Auth::user()->role == 'superadmin')
                    <li class="nav-item">
                        <a href="{{ route('prodi') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Seleksi Judul</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'staffprodi' || Auth::user()->role == 'superadmin')
                    <li class="nav-item">
                        <a href="{{ route('staffprodi') }}" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Surat bimbingan</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'staffprodi' || Auth::user()->role == 'superadmin')
                    <li class="nav-item">
                        <a href="{{ route('staffprodi.rekapitulasi') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Laporan Rekapitulasi</p>
                        </a>
                    </li>
                    @endif --}}
                    <hr>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">@yield('title')</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        {{-- <div class="float-right d-none d-sm-inline">
            Anything you want
        </div> --}}
        <strong>&copy; 2024 <a href="#">SIPENGJUDSI</a>.</strong> All rights reserved.
    </footer>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>

@stack('scripts')
