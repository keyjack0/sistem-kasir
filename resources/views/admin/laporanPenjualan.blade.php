@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main class="container mt-5">
    <!-- FILTER TANGGAL DAN JENIS -->
    <form method="GET" action="{{ url('/admin/laporanPenjualan') }}" class="d-flex gap-2 mb-4 filter-container align-items-center">
        <input type="date" name="tanggal" class="form-control w-auto"
            value="{{ request('tanggal', date('Y-m-d')) }}" required>

        <select name="filter" class="form-select w-auto">
            <option value="harian" {{ request('filter') == 'harian' ? 'selected' : '' }}>Per Hari</option>
            <option value="mingguan" {{ request('filter') == 'mingguan' ? 'selected' : '' }}>Per Minggu</option>
            <option value="bulanan" {{ request('filter') == 'bulanan' ? 'selected' : '' }}>Per Bulan</option>
        </select>

        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>

    <!-- LABEL TANGGAL -->
    @isset($labelTanggal)
        <h5 class="text-muted mb-3">{{ $labelTanggal }}</h5>
    @endisset

    <!-- TABEL LAPORAN -->
    <div class="table-responsive">
        <table class="table table-custom table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Kasir</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ strtoupper($row->metode_pembayaran) }}</td>
                        <td>Rp {{ number_format($row->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $row->nama_kasir }}</td>
                        <td>
                            <a href="{{ url('admin/detailLaporanPenjualan?id=' . $row->id_laporan) }}&filter={{ request('filter') }}&tanggal={{ request('tanggal') }}"
                                class="btn btn-sm btn-success">Laporan Pembayaran</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada transaksi ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>
</html>
