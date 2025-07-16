<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Mengatur warna latar belakang utama */
        body {
            background-color: #38E54D;
            /* Warna hijau cerah */
            font-family: 'Poppins', sans-serif;
            /* Font yang lebih modern (opsional) */
        }

        /* Kontainer untuk menengahkan form */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Styling untuk kartu login */
        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .login-card .card-body {
            padding: 2.5rem;
        }

        /* Styling untuk judul */
        .login-card .card-title {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
        }

        /* Styling untuk input field */
        .form-control {
            border-radius: 50rem;
            /* Membuat input sangat bundar */
            padding: 0.75rem 1.25rem;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
            border-color: #38E54D;
        }

        /* Styling untuk link "lupa password" */
        .forgot-password-link {
            font-size: 0.875em;
            text-decoration: none;
            color: #6c757d;
            transition: color 0.2s;
        }

        .forgot-password-link:hover {
            color: #212529;
        }

        /* Styling untuk tombol login */
        .btn-login {
            background-color: #38E54D;
            border: none;
            color: white;
            border-radius: 50rem;
            /* Membuat tombol sangat bundar */
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            transition: background-color 0.2s;
        }

        .btn-login:hover {
            background-color: #45a049;
            /* Warna hijau sedikit lebih gelap saat hover */
            color: white;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="login-container">
        <div class="card login-card">
            <div class="card-body">
                <h2 class="card-title text-center">Buat Akun Admin</h2>
                <form method="POST" action="{{ url('admin/daftarAdmin') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="nama_admin" class="form-control" id=""
                            placeholder="nama Admin" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" id="username" placeholder="username"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Konfirmasi Password" required>
                    </div>

                    <button type="submit" class="btn btn-login">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
