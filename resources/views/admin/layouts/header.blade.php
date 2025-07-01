<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Admin</title>

    <!-- CDN untuk Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CDN untuk Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Kustom untuk Styling -->
    <style>
        :root {
            --green-light: #3dd554;
            --red-logout: #ff4d4d;
            --bg-body: #f7faff;
            --green-darker: #34c749;
            --red-darker: #e84141;
            --border-color: #000;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
        }

        /* Styling Navbar */
        .navbar-custom {
            background-color: var(--green-light);
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            color: white;
        }

        .navbar-custom .nav-link {
            color: white;
            font-weight: 500;
            margin: 0 0.75rem;
            transition: color 0.2s ease-in-out;
        }

        .navbar-custom .nav-link i {
            margin-right: 0.5rem;
            /* Jarak antara ikon dan teks */
        }

        .navbar-custom .nav-link:hover {
            color: #e0ffe5;
        }

        .navbar-custom .nav-link.active {
            color: #000000;
            /* Warna sedikit lebih terang saat hover/aktif */
        }

        .btn-logout {
            background-color: var(--red-logout);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            /* Membuat tombol menjadi pil */
            padding: 0.5rem 1.5rem;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-logout:hover {
            background-color: #e63939;
            color: white;
        }

        /* Styling Kartu Informasi */
        .info-card {
            background-color: var(--green-light);
            color: white;
            border-radius: 16px;
            /* Sudut yang lebih bulat */
            border: none;
            padding: 1.25rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-card .card-title {
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .info-card .card-text {
            font-size: 2.5rem;
            /* Ukuran teks lebih besar */
            font-weight: 700;
            /* Teks lebih tebal */
        }

        /* untuk table menu*/
        .table-custom {
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        .table-custom thead th {
            background-color: var(--green-light);
            color: white;
            font-weight: 600;
            border-bottom: none;
            text-align: center;
        }

        .table-custom tbody td {
            vertical-align: middle;
            text-align: center;

        }

        /* [EDIT] Menambahkan garis kolom vertikal */
        .table-custom th,
        .table-custom td {
            border-right: 1px solid var(--border-color);
        }

        .table-custom th:last-child,
        .table-custom td:last-child {
            border-right: none;
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        /* untuk button halaman menu */
        .btn-action {
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.375rem 1rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease;
        }

        .btn-edit {
            background-color: var(--green-darker);
        }

        .btn-edit:hover {
            background-color: #2da43e;
            color: white;
        }

        .btn-delete {
            background-color: var(--red-darker);
        }

        .btn-delete:hover {
            background-color: #d33a3a;
            color: white;
        }

        /* Tombol Tambah Menu */
        .btn-add-menu {
            background-color: var(--green-light);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(61, 213, 84, 0.4);
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-add-menu:hover {
            background-color: #38c14d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(61, 213, 84, 0.5);
        }

        /* Filter Section */
        .filter-container {
            max-width: 400px;
        }

        .form-control-filter {
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .btn-filter {
            background-color: var(--green-light);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
        }

        .btn-filter:hover {
            background-color: #38c14d;
            color: white;
        }

        /* Styling Tabel Laporan */
        /* .table-custom {
            border: 1px solid #000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table-custom thead th {
            background-color: var(--green-light);
            color: white;
            font-weight: 600;
            border: 1px solid #000;
            text-align: center;
        }
         */
        /* .table-custom tbody td, .table-custom tbody th {
            vertical-align: middle;
            text-align: center;
            border: 1px solid #000;
        } */

        .btn-report {
            background-color: var(--green-light);
            color: white;
            /* border: 1px solid #000; */
            border-radius: 20px;
            padding: 0.375rem 1rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease;
            width: 80%;
        }

        .btn-report:hover {
            background-color: #38c14d;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Bagian Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Nama Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ url('admin/dashboard') }}"><i class="bi bi-grid-fill"></i>Dashboard</a>
                    <a class="nav-link {{ request()->is('admin/menu') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ '/admin/menu' }}"><i class="bi bi-card-checklist"></i>Daftar Menu</a>
                    <a class="nav-link {{ request()->is('admin/laporanPenjualan') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ '/admin/laporanPenjualan' }}"><i class="bi bi-bar-chart-line-fill"></i>Laporan
                        Penjualan</a>
                </div>
                {{-- <div class="navbar-nav mx-auto">
                    <a class="nav-link {{ request()->is('/') ? 'active text-blod fw-bold' : '' }}" href="{{ url('/') }}"><i class="bi bi-cart-fill"></i>Menu Penjualan</a>
                    <a class="nav-link {{ request()->is('laporanPenjualan') ? 'active text-bold fw-bold' : '' }}" href="{{ url('/laporanPenjualan') }}"><i class="bi bi-bar-chart-line-fill"></i>Laporan Penjualan</a>
                </div> --}}
                <form action="{{ route('admin.logout') }}" class="d-flex" method="POST">
                    @csrf
                    <button class="btn btn-logout" type="button">Logout</button>
                </form>
            </div>
        </div>
    </nav>
