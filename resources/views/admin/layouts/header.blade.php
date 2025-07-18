    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dasbor Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            :root {
                --green-light: #3dd554;
                --red-logout: #ff4d4d;
                --bg-body: #f7faff;
                --sidebar-width: 250px;
                /* Lebar sidebar */
            }

            body {
                font-family: 'Inter', sans-serif;
                background-color: var(--bg-body);
                display: flex;
                /* Menggunakan flexbox untuk layout utama */
                min-height: 100vh;
                /* Pastikan body mengambil tinggi penuh viewport */
                flex-direction: column;
                /* Mengatur arah flex menjadi kolom */
            }

            /* Styling Navbar */
            .navbar-custom {
                background-color: var(--green-light);
                padding: 1rem 2rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                z-index: 1000;
                /* Pastikan navbar di atas konten lain */
            }

            .navbar-custom .navbar-brand {
                font-weight: 700;
                color: white;
            }

            /* Sidebar Styling */
            .sidebar {
                width: var(--sidebar-width);
                background-color: #343a40;
                /* Warna gelap untuk sidebar */
                color: white;
                padding-top: 1rem;
                flex-shrink: 0;
                /* Mencegah sidebar menyusut */
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar .nav-link {
                color: rgba(255, 255, 255, 0.75);
                padding: 0.75rem 1.5rem;
                display: flex;
                align-items: center;
                transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
            }

            .sidebar .nav-link i {
                margin-right: 0.75rem;
                font-size: 1.1rem;
            }

            .sidebar .nav-link:hover {
                background-color: #495057;
                color: white;
            }

            .sidebar .nav-link.active {
                background-color: var(--green-light);
                color: white;
                font-weight: 600;
            }

            /* Main Content Styling */
            .main-content {
                flex-grow: 1;
                /* Biarkan konten utama mengisi sisa ruang */
                padding: 1.5rem;
                overflow-y: auto;
                /* Jika konten melebihi tinggi, tambahkan scroll */
            }



            .btn-logout {
                background-color: var(--red-logout);
                color: white;
                font-weight: 600;
                border: none;
                border-radius: 50px;
                padding: 0.5rem 1.5rem;
                transition: background-color 0.2s ease-in-out;
            }

            .btn-logout:hover {
                background-color: #e63939;
                color: white;
            }

            /* Styling Kartu Informasi */
            .info-card {
                background-color: var(--green-light);
                color: white;
                border-radius: 16px;
                border: none;
                padding: 1.25rem;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                height: 100%;
                /* Ensure cards take full height of their column */
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .info-card .card-title {
                font-size: 1rem;
                font-weight: 500;
                margin-bottom: 0.25rem;
            }

            .info-card .card-text {
                font-size: 2.5rem;
                font-weight: 700;
                line-height: 1;
                /* Adjust line height for better spacing */
            }

            .btn-add-menu {
                background-color: var(--green-light);
                color: white;
                border: none;
                border-radius: 50px;
                padding: 0.75rem 2.5rem;
                font-size: 1.1rem;
                font-weight: 600;
                box-shadow: 0 4px 12px rgba(61, 213, 84, 0.4);
                transition: all 0.2s ease;
                text-decoration: none;
            }

            .btn-add-menu:hover {
                background-color: #38c14d;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 6px 16px rgba(61, 213, 84, 0.5);
            }

            /* .btn-main-action {
            width: 20%;
            background-color: var(--green-light);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(61, 213, 84, 0.4);
            transition: all 0.2s ease;
        }

        .btn-main-action:hover {
            background-color: #38c14d;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(61, 213, 84, 0.5);
        }

         .cancel-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: var(--text-secondary);
            text-decoration: underline;
            font-weight: 500;
        }
        .cancel-link:hover {
            color: #333;
        } */
        </style>
    </head>

    <body>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    text: '{{ session('success') }}'
                });
            </script>
        @endif
        @if ($errors->has('admin'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            text: '{{ $errors->first('admin') }}'
                        });
                    </script>
                @endif
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Nama Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <form action="{{ route('admin.logout') }}" class="d-flex" method="POST">
                            @csrf
                            <button class="btn btn-logout" type="submit">Logout</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
