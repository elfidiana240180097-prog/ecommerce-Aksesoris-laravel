<!DOCTYPE html>
<html>
<head>

    <title>Edit Produk</title>

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

            <a href="/admin/produk"
            class="btn btn-dark">

                Kembali

            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card p-4 shadow border-0 rounded-4">

                <h2 class="fw-bold mb-4">

                    Edit Produk

                </h2>

                <form
                action="/admin/update-produk/{{ $product->id }}"
                method="POST"
                enctype="multipart/form-data">

                    @csrf

                    <label class="fw-semibold mb-2">
                        Nama Produk
                    </label>

                    <input
                    type="text"
                    name="nama_produk"
                    class="form-control mb-3"
                    value="{{ $product->nama_produk }}">

                    <label class="fw-semibold mb-2">
                        Harga Produk
                    </label>

                    <input
                    type="number"
                    name="harga"
                    class="form-control mb-3"
                    value="{{ $product->harga }}">

                    <label class="fw-semibold mb-2">
                        Gambar Lama
                    </label>

                    <div class="mb-3">

                        <img
                        src="/images/{{ $product->gambar }}"
                        width="120"
                        class="rounded shadow-sm">

                    </div>

                    <label class="fw-semibold mb-2">
                        Upload Gambar Baru
                    </label>

                    <input
                    type="file"
                    name="gambar"
                    class="form-control mb-3">

                    <label class="fw-semibold mb-2">
                        Deskripsi Produk
                    </label>

                    <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control mb-4">{{ $product->deskripsi }}</textarea>

                    <button
                    class="btn btn-primary w-100">

                        Update Produk

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>