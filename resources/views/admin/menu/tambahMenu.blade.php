@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main class="container mt-5">
    <div class="form-container">
        <form method="POST" action="{{ url('admin/menu/store') }}">
            @csrf

            <div class="mb-3">
                <select name="id_kategori" class="form-select form-select-custom" required>
                    <option value="">Pilih kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="text" name="nama_menu" class="form-control form-control-custom" placeholder="Nama Menu" value="{{ old('nama_menu') }}">
            </div>

            <div class="mb-4">
                <input type="number" name="harga_menu" class="form-control form-control-custom" placeholder="Harga Menu" value="{{ old('harga_menu') }}">
            </div>
            
            <button type="submit" class="btn btn-add-menu btn-success">Tambah Menu</button>
            <a href="{{ url('admin/menu') }}" class="cancel-link">Batal tambah</a>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
