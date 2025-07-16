 <div class="d-flex flex-grow-1"> <nav class="sidebar py-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ url('admin/dashboard') }}"><i class="bi bi-grid-fill"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/menu') ? 'active text-bold fw-bold' : '' }}" href="{{ url('admin/menu') }}"><i class="bi bi-card-checklist"></i>Daftar Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/laporanPenjualan') ? 'active text-bold fw-bold' : '' }}" href="{{ url('admin/laporanPenjualan') }}"><i class="bi bi-bar-chart-line-fill"></i>Laporan Penjualan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/kategori') ? 'active text-bold fw-bold' : '' }}" href="{{ url('admin/kategori') }}" ><i class="bi bi-filter-left"></i>Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/register') ? 'active text-bold fw-bold' : '' }}" href="{{ url('admin/register') }}" ><i class="bi bi-person-fill"></i>Registrasi User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/registerAdmin') ? 'active text-bold fw-bold' : '' }}" href="{{ url('admin/registerAdmin') }}"><i class="bi bi-person-fill"></i>Registrasi Admin</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-gear-fill"></i>Pengaturan</a>
                </li> --}}
            </ul>
        </nav>

         {{-- <div class="navbar-nav mx-auto">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ url('admin/dashboard') }}"><i class="bi bi-grid-fill"></i>Dashboard</a>
                    <a class="nav-link {{ request()->is('admin/menu') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ '/admin/menu' }}"><i class="bi bi-card-checklist"></i>Daftar Menu</a>
                    <a class="nav-link {{ request()->is('admin/laporanPenjualan') ? 'active text-bold fw-bold' : '' }}"
                        href="{{ '/admin/laporanPenjualan' }}"><i class="bi bi-bar-chart-line-fill"></i>Laporan
                        Penjualan</a>
                </div> --}}