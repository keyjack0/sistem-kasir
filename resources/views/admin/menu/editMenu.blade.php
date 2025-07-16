@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main class="container mt-5">
    <div class="form-container">
        <form method="POST" action="{{ url('admin/menu/update/' . $menu->id_menu) }}">
            @csrf

            <div class="mb-3">
                <select name="id_kategori" class="form-select form-select-custom" required>
                    <option value="">Pilih kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}" {{ $menu->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="text" name="nama_menu" class="form-control form-control-custom" placeholder="Nama Menu" value="{{ $menu->nama_menu }}" required>
            </div>

            <div class="mb-4">
                <input type="number" name="harga_menu" class="form-control form-control-custom" placeholder="Harga Menu" value="{{ $menu->harga_menu }}" required>
            </div>
            
            <button type="submit" class="btn btn-main-action btn-success">Ubah Menu</button>
            <a href="{{ url('admin/menu') }}" class="cancel-link">Batal ubah</a>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
