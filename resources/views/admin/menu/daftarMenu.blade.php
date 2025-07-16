@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="d-flex flex-grow-1">
    <main class="main-content container mt-4">
        <h2 class="mb-4 text-center">Daftar Menu</h2>

        <div class="table-responsive table-container">
            <table class="table table-custom table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ url('admin/menu/edit/'.$menu->id_menu) }}" class="btn-action btn-edit btn btn-success btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Ubah
                                </a>
                                <a href="{{ url('admin/menu/delete/'.$menu->id_menu) }}" class="btn-action btn-delete btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="{{ url('admin/menu/create') }}" class="btn-add-menu ">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Menu Baru
            </a>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
