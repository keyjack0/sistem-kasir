@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main class="container mt-5">
    <div class="form-container">
        <form method="POST" action="{{ url('admin/kategori/ubah/' . $kategori->id_kategori) }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="nama_kategori" class="form-control form-control-custom" placeholder="Nama kategori" value="{{ $kategori->nama_kategori }}" required>
            </div>
            
            <button type="submit" class="btn btn-main-action btn-success">Ubah Kategori</button>
            <a href="{{ url('admin/kategori') }}" class="cancel-link">Batal ubah</a>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
