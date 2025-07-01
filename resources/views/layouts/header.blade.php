<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Penjualan - Dasbor Admin</title>

    <!-- CDN untuk Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CDN untuk Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- @csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- CSS Kustom untuk Styling -->
    <style>
        :root {
            --green-primary: #3dd554;
            --green-light-bg: #f0fff4;
            --green-dark: #28a745;
            --red-action: #ff4d4d;
            --bg-body: #f7faff;
            --text-dark: #343a40;
            --border-color: #000;

            
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
        }

        /* Styling Navbar */
        .navbar-custom {
            background-color: var(--green-primary);
            padding: 1rem 2rem;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
            font-weight: 600;
        }
        .navbar-custom .nav-link i {
            margin-right: 0.5rem;
        }
        .navbar-custom .nav-link.active {
            color: var(--text-dark);
        }
        .btn-logout {
            background-color: var(--red-action);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
        }

          .btn-logout:hover {
            background-color: #e63939;
            color: white;
        }

        /* Konten Utama */
        .menu-item {
            background-color: var(--green-light-bg);
            border: 1px solid var(--green-primary);
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(61, 213, 84, 0.2);
        }
        .menu-item .card-title {
            font-weight: 600;
        }
        .menu-item .card-text {
            color: var(--green-dark);
            font-weight: 500;
        }

        /* Keranjang Belanja */
        .cart-section {
            background-color: var(--green-light-bg);
            border-radius: 16px;
            padding: 1.5rem;
            height: 100%;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border-radius: 40px;
            padding: 0.5rem 1rem;
            margin-bottom: 0.75rem;
        }
        .cart-item-details { font-weight: 500; }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .btn-qty {
            background-color: #e9ecef;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .cart-summary {
            border-top: 1px solid #ddd;
            padding-top: 1rem;
            margin-top: auto;
        }
        .btn-pay {
            background-color: var(--green-dark);
            color: white;
            border-radius: 40px;
            font-weight: 600;
            padding: 0.75rem;
            width: 100%;
        }

        /* Styling Modal Pembayaran */
        .modal-title {
            font-weight: 700;
        }
        .modal-table {
            border: 1px solid var(--border-color);
            border-radius: 20px;
            overflow: hidden;
        }
        .modal-table thead th {
            background-color: var(--green-primary);
            color: white;
            border: 1px solid var(--border-color);
            text-align: center;
        }
        .modal-table tbody td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid var(--border-color);
        }
        .modal-summary {
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .btn-cancel {
            background-color: var(--red-action);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 2rem;
        }
        .btn-confirm-pay {
            background-color: var(--green-primary);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 2rem;
        }

 /* untuk filter di laporan penjualan */
  .filter-container {
            max-width: 400px;
        }
        .form-control-filter {
             border-radius: 20px;
             border: 1px solid #ccc;
        }
        .btn-filter {
            background-color: var(--green-primary);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
        }
        .btn-filter:hover {
            background-color: #28a745;
            color: white;
        }

/* untuk modifikasi table laporan penjualan*/
        .table-custom {
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table-custom thead th {
            background-color: var(--green-primary);
            color: white;
            font-weight: 600;
            border: 1px solid var(--border-color);
            text-align: center;
        }
        
        .table-custom tbody td, .table-custom tbody th {
            vertical-align: middle;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .btn-report {
            background-color: var(--green-primary);
            color: white;
            /* border: 1px solid var(--border-color); */
            border-radius: 20px;
            padding: 0.375rem 1rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease;
            width: 80%;
        }
        .btn-report:hover {
            background-color: #28a745;
            color: white;
        }

        /* untuk detail laporan penjualan0 */
              /* Konten Laporan */
        .report-container {
            max-width: 800px;
            margin: auto;
        }

        .report-title {
            text-align: center;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        /* Styling Tabel Laporan */
        /* .table-custom {
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table-custom thead th {
            background-color: var(--green-light);
            color: white;
            font-weight: 600;
            border: 1px solid var(--border-color);
            text-align: center;
        }
        
        .table-custom tbody td, .table-custom tbody th {
            vertical-align: middle;
            text-align: center;
            border: 1px solid var(--border-color);
        } */

        .report-summary {
            margin-top: 1.5rem;
            font-size: 1.1rem;
            font-weight: 500;
            text-align: center;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: underline;
            color: #333;
        }
        .back-link:hover {
            color: var(--green-primary);
        }


    </style>
</head>
<body>
    <!-- Bagian Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Nama Pengguna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link {{ request()->is('/user/dashboard') ? 'active text-blod fw-bold' : '' }}" href="{{ url('/user/dashboard') }}"><i class="bi bi-cart-fill"></i>Menu Penjualan</a>
                    <a class="nav-link {{ request()->is('/user/laporan') ? 'active text-bold fw-bold' : '' }}" href="{{ url('/user/laporan') }}"><i class="bi bi-bar-chart-line-fill"></i>Laporan Penjualan</a>
                </div>
                <form action="{{ route('user.logout') }}" class="d-flex" method="POST">
                    @csrf
                    <button class="btn btn-logout" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
