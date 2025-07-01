<h4>{{ $labelTanggal }}</h4>
<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Kasir</th>
            <th>Metode Pembayaran</th>
            {{-- <th>Jumlah</th> --}}
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporan as $item)
            <tr>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->nama_kasir }}</td>
                <td>{{ $item->metode_pembayaran }}</td>
                {{-- <td>{{ $item->jumlah }}</td> --}}
                <td>{{ number_format($item->total_harga) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
