@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<!-- Konten Utama Dasbor -->
<main class="container mt-5">
    <div class="row g-4">

        <!-- Kartu Pendapatan per hari -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Pendapatan Hari Ini</h5>
                    <p class="card-text">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Kartu Menu yang Dipesan per hari -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Total Menu Dipesan Hari Ini</h5>
                    <p class="card-text">{{ $menuDipesan }}</p>
                </div>
            </div>
        </div>

        <!-- Kartu Jumlah Menu -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Jumlah Menu Tersedia</h5>
                    <p class="card-text">{{ $jumlahMenu }}</p>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
