<!DOCTYPE html>
<html>
<head>
    <title>Toko Aksesoris</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3 logo-brand">

            GlowStyle

        </a>

        <div class="d-flex align-items-center">

            <input
            type="text"
            id="search"
            placeholder="Cari produk..."
            class="form-control me-3"
            style="width:220px;"
            onkeyup="cariProduk()">

            <a class="text-dark text-decoration-none me-4 fw-semibold"
            href="/">

                Home

            </a>

            <a class="text-dark text-decoration-none me-4 fw-semibold"
            href="/keranjang">

                 Keranjang
                (<span id="jumlah-keranjang">0</span>)

            </a>

            <a class="text-dark text-decoration-none me-4 fw-semibold"
            href="/pesanan-saya">

                Pesanan Saya

            </a>

            <a class="btn btn-sm px-4 btn-checkout"
            href="/checkout">

                Checkout

            </a>

        </div>

    </div>

</nav>

<section class="py-5 hero-section">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="fw-bold display-5">

                    Koleksi Aksesoris
                    Fashion Modern

                </h1>

                <p class="mt-3 text-secondary">

                    Temukan gelang, kalung,
                    dan aksesoris terbaik
                    dengan style kekinian.

                </p>

                <a href="#produk"
                class="btn btn-lg mt-3 px-4 btn-belanja">

                    Belanja Sekarang

                </a>

            </div>

            <div class="col-md-6 text-center">

                <img
                src="/images/kalung.jpg"
                class="img-fluid rounded-4 shadow hero-image">

            </div>

        </div>

    </div>

</section>

<div class="container mt-4">

    <h1 class="text-center mb-4">
        Toko Aksesoris
    </h1>

    <h3 id="produk"
    class="fw-bold mb-4">

        Produk Terbaru

    </h3>

<div class="row">

    @foreach($products as $data)

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 produk-item">
        <div class="card produk-card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

            <div class="produk-image">

                <img
                src="/images/{{ $data->gambar }}"
                class="card-img-top">

            </div>

            <div class="card-body">

                <a href="/detail/{{ $data->id }}"
                class="text-decoration-none">

                    <h5 class="produk-title">

                        {{ $data->nama_produk }}

                    </h5>

                </a>

                <p class="produk-harga">

                    Rp {{ number_format($data->harga) }}

                </p>

                <div class="d-grid gap-2">

                    <!-- TOMBOL KERANJANG -->

                    <button
                    class="btn btn-primary rounded-pill"
                    onclick="tambah(
                    '{{ $data->nama_produk }}',
                    {{ $data->harga }}
                    )">

                        + Keranjang

                    </button>

                    <!-- TOMBOL BELI -->

                    <button
                    class="btn btn-outline-primary rounded-pill"
                    onclick="beliSekarang(
                    '{{ $data->nama_produk }}'
                    )">

                        Beli Sekarang

                    </button>

                </div>

            </div>

        </div>

    </div>

    @endforeach

</div>

</div>

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

<script>

let keranjang =
JSON.parse(localStorage.getItem("keranjang")) || {};

let total =
parseInt(localStorage.getItem("total")) || 0;

function hitungJumlah() {

    let totalItem = 0;

    for (let item in keranjang) {
        totalItem += keranjang[item];
    }

    return totalItem;
}

function updateKeranjang() {

    document.getElementById(
    "jumlah-keranjang"
    ).innerText = hitungJumlah();

}

function beliSekarang(nama) {

    let dataCheckout = {};

    dataCheckout[nama] = 1;

    localStorage.setItem(
    "keranjang",
    JSON.stringify(dataCheckout)
    );

    window.location.href = "/checkout";
}

function tambah(nama, harga) {

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

    updateKeranjang();

    // TOAST
    let toast =
    document.getElementById("toast");

    toast.classList.add("show");

    setTimeout(() => {

        toast.classList.remove("show");

    }, 2000);
}

function cariProduk() {

    let input =
    document.getElementById("search")
    .value
    .toLowerCase();

    let produk =
    document.querySelectorAll(".produk-item");

    produk.forEach(function(item){

        let nama =
        item.innerText.toLowerCase();

        if(nama.includes(input)) {

            item.style.display = "block";

        } else {

            item.style.display = "none";

        }

    });

}

updateKeranjang();

</script>

<!-- TOAST -->

<div id="toast">

    Produk berhasil ditambahkan

</div>

</body>
</html>