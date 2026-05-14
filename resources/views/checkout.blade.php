<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>

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

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card p-4 shadow-sm border-0 rounded-4">

                <h2 class="fw-bold mb-4 text-center">

                    Checkout Pesanan

                </h2>

                <h5 class="mb-3">
                    Detail Pesanan
                </h5>

                <div id="detail-pesanan"></div>

                <hr>

                <h4 class="mb-4">

                    Total Belanja:

                    <span class="text-primary">

                        <span id="total-belanja">

                            Rp 0

                        </span>

                    </span>

                </h4>

                <!-- FORM CHECKOUT -->
                <form action="/checkout" method="POST">

                    @csrf

                    <input
                    type="text"
                    name="nama"
                    class="form-control mb-3"
                    placeholder="Masukkan Nama"
                    required>

                    <textarea
                    name="alamat"
                    class="form-control mb-3"
                    placeholder="Masukkan Alamat"
                    rows="4"
                    required></textarea>

                    <!-- TOTAL -->
                    <input
                    type="hidden"
                    name="total"
                    id="input-total">

                    <!-- PRODUK -->
                    <input
                    type="hidden"
                    name="produk"
                    id="input-produk">


                    <div class="mb-4">

    <label class="fw-semibold mb-2">

        Metode Pembayaran

    </label>

    <div class="card border-0 bg-light rounded-4 p-3">

        <div class="form-check">

            <input
            class="form-check-input"
            type="radio"
            checked>

            <label class="form-check-label fw-semibold">

                Cash On Delivery (COD)

            </label>

        </div>

        <small class="text-secondary">

            Pembayaran dilakukan saat paket diterima.

        </small>

    </div>

</div>
                    <button
                    class="btn btn-primary w-100 py-2"
                    type="submit">

                        Buat Pesanan

                    </button>

                </form>

            </div>

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

let total = 0;

let detail =
document.getElementById("detail-pesanan");

for (let item in keranjang) {

    let jumlah =
    parseInt(keranjang[item]);

    let harga =
    parseInt(hargaBarang[item]);

    total += jumlah * harga;

    let div =
    document.createElement("div");

    div.className =
    "d-flex justify-content-between align-items-center bg-white border rounded-4 p-3 mb-3 shadow-sm";

    div.innerHTML = `

        <div>

            <h5 class="mb-1">${item}</h5>

            <p class="mb-0 text-secondary">

                ${jumlah} x Rp ${harga.toLocaleString("id-ID")}

            </p>

        </div>

        <div class="fw-bold text-primary">

            Rp ${(jumlah * harga).toLocaleString("id-ID")}

        </div>

    `;

    detail.appendChild(div);

}

document.getElementById("total-belanja").innerText =
"Rp " + total.toLocaleString("id-ID");

document.getElementById("input-total").value =
total;

/* PRODUK MASUK DATABASE */
document.getElementById("input-produk").value =
JSON.stringify(keranjang);

</script>

</body>
</html>