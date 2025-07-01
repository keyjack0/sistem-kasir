@include('admin.layouts.header') 

    <!-- Konten Utama Laporan Penjualan -->
    <main class="container mt-5">
        <!-- Filter Tanggal -->
        <div class="d-flex gap-2 mb-4 filter-container">
            <input type="text" class="form-control form-control-filter" value="01/01/2025">
            <button class="btn btn-filter">Filter</button>
        </div>

        <!-- Tabel Laporan -->
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>CASH</td>
                        <td>29000</td>
                        <td>
                            <a href="detail-laporan-penjualan.html" class="btn btn-report">Laporan Pembayaran</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>QRIS</td>
                        <td>15000</td>
                        <td>
                            <a href="detail-laporan-penjualan.html" class="btn btn-report">Laporan Pembayaran</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>CASH</td>
                        <td>12000</td>
                        <td>
                             <a href="detail-laporan-penjualan.html" class="btn btn-report">Laporan Pembayaran</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <!-- CDN untuk Bootstrap JS (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
