    @include ('layouts.header')

    <!-- Konten Utama Laporan Penjualan -->
    <main class="container mt-5">
        <!-- Filter Tanggal -->
        <!-- Filter Tanggal -->
        <div>
            <h5 class="text-muted mb-3">{{ $labelTanggal }}</h5>

            <form method="GET" action="{{ url('/user/laporan') }}" class="d-flex gap-2 mb-3">
                <input type="date" name="tanggal" class="form-control w-auto"
                    value="{{ request('tanggal', date('Y-m-d')) }}">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </form>

            <form action="{{ route('laporan.export') }}" method="GET" target="_blank" class="mb-3">
                <input type="hidden" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">
                <button class="btn btn-success">Export Excel</button>
            </form>
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
                    @forelse ($laporan as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $row->metode_pembayaran }}</td>
                            <td>Rp {{ number_format($row->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ url('user/detailLaporanPenjualan?id=' . $row->id_laporan) }}"
                                    class="btn btn-report">Laporan Pembayaran</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Tidak ada transaksi ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <!-- CDN untuk Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </body>

    </html>
