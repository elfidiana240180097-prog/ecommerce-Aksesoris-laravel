<!DOCTYPE html>
<html>
<head>

    <title>Kelola Produk</title>

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

            <a href="/admin/dashboard"
            class="btn btn-dark me-2">

                Dashboard

            </a>

            <a href="/logout"
            class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="card p-4 shadow border-0 rounded-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                Kelola Produk

            </h2>

            <a href="/admin/tambah-produk"
            class="btn btn-primary">

                + Tambah Produk

            </a>

        </div>

        <table class="table table-bordered align-middle">

            <thead class="table-light">

                <tr>

                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($products as $product)

                <tr>

                    <td width="120">

                        <img
                        src="/images/{{ $product->gambar }}"
                        width="100"
                        class="rounded">

                    </td>

                    <td>

                        {{ $product->nama_produk }}

                    </td>

                    <td>

                        Rp {{ number_format($product->harga) }}

                    </td>

                    <td width="220">

                        <a href="/admin/edit-produk/{{ $product->id }}"
                        class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="/admin/hapus-produk/{{ $product->id }}"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus produk?')">

                            Hapus

                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>