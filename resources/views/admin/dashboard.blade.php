
       @include('admin.layouts.header')

    <!-- Konten Utama Dasbor -->
    <main class="container mt-5">
        <div class="row g-4">
            <!-- Kartu Pendapatan per hari -->
            <div class="col-lg-3 col-md-6">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan perhari</h5>
                        <p class="card-text">Rp 999.999</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Pesanan per hari -->
            <div class="col-lg-3 col-md-6">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan perhari</h5>
                        <p class="card-text">99</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- CDN untuk Bootstrap JS (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
