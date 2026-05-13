<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>

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

<!-- CONTENT -->

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="fw-bold mb-4">
            Keranjang Belanja
        </h2>

        <div id="isiKeranjang"></div>

        <hr>

        <h5>
            Jumlah Barang:
            <span id="jumlahBarang">0</span>
        </h5>

        <h4 class="mt-3">
            Total:
            <span class="text-primary">
                Rp <span id="total">0</span>
            </span>
        </h4>

        <div class="mt-4">

            <button
            class="btn btn-danger"
            onclick="kosongkanKeranjang()">

                Kosongkan

            </button>

            <a href="/checkout"
            class="btn btn-success ms-2">

                Checkout

            </a>

            <a href="/"
            class="btn btn-secondary ms-2">

                Lanjut Belanja

            </a>

        </div>

    </div>

</div>

<script>

let hargaBarang = {

    "Gelang": 10000,
    "Kalung": 20000,
    "Kacamata": 15000,
    "Topi": 25000,
    "Cincin Elegant": 18000,
    "Anting Mutiara": 22000,
    "Jam Tangan Wanita": 85000,
    "Tas Mini Fashion": 65000,
    "hijab pin": 40000,
    "Bando Korea": 12000,
    "Totebag Aesthetic": 55000,
    "Case HP Lucu": 30000,
    "Dompet Mini": 35000,
    "Scrunchie Satin": 10000

};

let keranjang =
JSON.parse(localStorage.getItem("keranjang")) || {};

let total =
parseInt(localStorage.getItem("total")) || 0;

function tampilkanKeranjang() {

    let container =
    document.getElementById("isiKeranjang");

    container.innerHTML = "";

    let jumlah = 0;
    let totalHarga = 0;

    for(let nama in keranjang) {

        let qty = keranjang[nama];

        jumlah += qty;

        totalHarga += qty * hargaBarang[nama];

        container.innerHTML += `

        <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-3 bg-white shadow-sm">

            <div>

                <h5>${nama}</h5>

                <p class="mb-0">
                    Rp ${hargaBarang[nama].toLocaleString("id-ID")}
                </p>

            </div>

            <div>

                <button
                class="btn btn-sm btn-danger"
                onclick="kurang('${nama}')">

                    -

                </button>

                <span class="mx-3 fw-bold">
                    ${qty}
                </span>

                <button
                class="btn btn-sm btn-success"
                onclick="tambah('${nama}')">

                    +

                </button>

            </div>

        </div>

        `;
    }

    document.getElementById("jumlahBarang").innerText =
    jumlah;

    document.getElementById("total").innerText =
    totalHarga.toLocaleString("id-ID");
}

function tambah(nama) {

    keranjang[nama]++;

    localStorage.setItem(
    "keranjang",
    JSON.stringify(keranjang)
    );

    tampilkanKeranjang();
}

function kurang(nama) {

    keranjang[nama]--;

    if(keranjang[nama] <= 0) {

        delete keranjang[nama];
    }

    localStorage.setItem(
    "keranjang",
    JSON.stringify(keranjang)
    );

    tampilkanKeranjang();
}

function kosongkanKeranjang() {

    localStorage.removeItem("keranjang");

    localStorage.removeItem("total");

    keranjang = {};

    tampilkanKeranjang();
}

tampilkanKeranjang();

</script>

</body>
</html>