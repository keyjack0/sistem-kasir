@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main class="container mt-5">
    <div class="form-container">
        <form method="POST" action="{{ url('admin/kategori/tambah') }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="nama_kategori" class="form-control form-control-custom" placeholder="Nama Kategori" value="{{ old('nama_kategori') }}">
            </div>

            <button type="submit" class="btn btn-add-menu btn-success">Tambah Kategori</button>
            <a href="{{ url('admin/kategori') }}" class="cancel-link">Batal tambah</a>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
