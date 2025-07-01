  @include ('admin.layouts.header')
  
  <!-- Konten Utama Daftar Menu -->
    <main class="container mt-5">
        <div class="table-responsive">
            <table class="table table-custom table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Makanan 1</td>
                        <td>10000</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="ubah-menu.html" class="btn-action btn-edit">Ubah</a>
                                <a href="#" class="btn-action btn-delete">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Makanan 2</td>
                        <td>12000</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn-action btn-edit">Ubah</a>
                                <a href="#" class="btn-action btn-delete">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Minuman 1</td>
                        <td>3000</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn-action btn-edit">Ubah</a>
                                <a href="#" class="btn-action btn-delete">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Minuman 2</td>
                        <td>4000</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="btn-action btn-edit">Ubah</a>
                                <a href="#" class="btn-action btn-delete">Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tombol Tambah Menu -->
        <div class="d-flex justify-content-center mt-4">
            <a href="tambah-menu.html" class="btn-add-menu">Tambah Menu</a>
        </div>
    </main>

    <!-- CDN untuk Bootstrap JS (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>