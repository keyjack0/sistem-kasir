 @include ('admin.layouts.header') 
 <!-- Bagian Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Nama Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link" href="../dashboard.html"><i class="bi bi-grid-fill"></i>Dashboard</a>
                    <a class="nav-link active" href="daftar-menu.html"><i class="bi bi-card-checklist"></i>Daftar Menu</a>
                    <a class="nav-link" href="#"><i class="bi bi-bar-chart-line-fill"></i>Laporan Penjualan</a>
                </div>
                <form class="d-flex">
                    <button class="btn btn-logout" type="button">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten Utama Form Tambah Menu -->
    <main class="container mt-5">
        <div class="form-container">
            <form>
                <div class="mb-3">
                    <select class="form-select form-select-custom" aria-label="Pilih kategori">
                        <option selected>Pilih kategori</option>
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                        <!-- <option value="3">Camilan</option> -->
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control form-control-custom" id="namaMenu" placeholder="Nama Menu">
                </div>
                <div class="mb-4">
                    <input type="number" class="form-control form-control-custom" id="hargaMenu" placeholder="Harga Menu">
                </div>
                
                <button type="submit" class="btn btn-add-menu">Tambah Menu</button>
                <a href="daftar-menu.html" class="cancel-link">batal tambah</a>
            </form>
        </div>
    </main>

    <!-- CDN untuk Bootstrap JS (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
