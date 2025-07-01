    @include ('layouts.header')

    <!-- Konten Utama Laporan Pembayaran -->
    <main class="container mt-5">
        <div class="report-container">
            <h2 class="report-title">Laporan Pembayaran</h2>

            <!-- Tabel Detail Pembayaran -->
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Harga Menu</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ $item->nama_menu }}</td>
                                <td>Rp {{ number_format($item->harga_menu, 0, ',', '.') }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- Ringkasan Pembayaran -->
            <div class="report-summary">
                <p class="mb-1">Metode Pembayaran : {{ strtoupper($laporan->metode_pembayaran) }}</p>
                <p>Total Harga : Rp {{ number_format($laporan->total_harga, 0, ',', '.') }}</p>
            </div>


            <!-- Tombol Kembali -->
            <a href="{{ url('user/laporan') }}" class="back-link">Kembali</a>
        </div>
    </main>

    <!-- CDN untuk Bootstrap JS (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </body>

    </html>
