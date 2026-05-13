<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">

</head>

<body style="background:#f1f5f9;">

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3 logo-brand">

            GlowStyle Admin

        </a>

        <div>

            <a href="/logout"
            class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="card p-4 shadow border-0 rounded-4">

        <h1 class="fw-bold">

            Dashboard Admin

        </h1>

        <p class="mt-2">

            Selamat datang,
            <b>{{ session('nama') }}</b>

        </p>

        <hr>

        <div class="row mt-4">

            <div class="col-md-4">

                <div class="card p-4 text-center shadow-sm border-0">

                    <h5 class="fw-bold">

                        Produk

                    </h5>

                    <p>

                        Kelola semua produk toko

                    </p>

                    <a href="/admin/produk"
                    class="btn btn-primary">

                        Kelola Produk

                    </a>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card p-4 text-center shadow-sm border-0">

                    <h5 class="fw-bold">

                        Pesanan

                    </h5>

                    <p>

                        Lihat daftar pesanan

                    </p>

                    <a href="/admin/pesanan"
                    class="btn btn-success">

                        Lihat Pesanan

                    </a>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card p-4 text-center shadow-sm border-0">

                    <h5 class="fw-bold">

                        Website

                    </h5>

                    <p>

                        Lihat halaman pembeli

                    </p>

                    <a href="/"
                    class="btn btn-dark">

                        Buka Website

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>