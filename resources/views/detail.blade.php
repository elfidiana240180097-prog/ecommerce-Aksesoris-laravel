<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->nama_produk }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">

</head>
<body style="background:#f1f5f9;">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3 logo-brand">

            GlowStyle

        </a>

        <div>

            <a class="text-dark text-decoration-none me-4 fw-semibold"
            href="/">

                Home

            </a>

            <a class="text-dark text-decoration-none me-4 fw-semibold"
            href="/keranjang">

                Keranjang

            </a>

            <a class="btn btn-sm px-4 btn-checkout"
            href="/checkout">

                Checkout

            </a>

        </div>

    </div>

</nav>

<!-- DETAIL PRODUK -->
<div class="container mt-5 mb-5">

    <div class="card p-4 border-0 shadow-lg rounded-4">

        <div class="row align-items-center">

            <!-- GAMBAR -->
            <div class="col-md-6">

                <img
                src="/images/{{ $product->gambar }}"
                class="img-fluid rounded-4 shadow hero-image w-100">

            </div>

            <!-- DETAIL -->
            <div class="col-md-6">

                <h1 class="fw-bold mb-3"
                style="font-size:55px; color:#0f172a;">

                    {{ $product->nama_produk }}

                </h1>

                <h2 class="fw-bold mb-4 text-primary">

                    Rp {{ number_format($product->harga) }}

                </h2>

                <p class="text-secondary fs-5 mb-4">

                    {{ $product->deskripsi }}

                </p>

                <button
                class="btn btn-primary btn-lg px-5"
                onclick="tambahKeranjang(
                '{{ $product->nama_produk }}',
                {{ $product->harga }}
                )">

                    Tambah ke Keranjang

                </button>

            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="text-center p-4 mt-5"
style="background:#1e3a8a;color:white;">

    <h5>GlowStyle</h5>

    <p>
        Toko aksesoris modern dan fashionable
    </p>

    <small>
        © 2026 GlowStyle. All Rights Reserved.
    </small>

</footer>

<!-- TOAST -->
<div id="toast">

    Produk berhasil ditambahkan 🛒

</div>

<script>

let keranjang =
JSON.parse(localStorage.getItem("keranjang")) || {};

let total =
parseInt(localStorage.getItem("total")) || 0;

function tambahKeranjang(nama, harga) {

    total += harga;

    if (keranjang[nama]) {

        keranjang[nama]++;

    } else {

        keranjang[nama] = 1;

    }

    localStorage.setItem(
    "keranjang",
    JSON.stringify(keranjang)
    );

    localStorage.setItem(
    "total",
    total
    );

    // TOAST
    let toast =
    document.getElementById("toast");

    toast.classList.add("show");

    setTimeout(() => {

        toast.classList.remove("show");

    }, 2000);
}

</script>

</body>
</html>