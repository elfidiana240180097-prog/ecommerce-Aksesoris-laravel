<!DOCTYPE html>
<html>
<head>

    <title>Pesanan Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body style="background:#f4f8ff;">

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 border-bottom">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3"
        style="color:#2563eb;">

            GlowStyle

        </a>

        <a href="/"
        class="btn rounded-pill px-4 fw-semibold"
        style="background:#2563eb; color:white;">

            Kembali

        </a>

    </div>

</nav>

<div class="container mt-5">

    <div class="mb-4">

        <h2 class="fw-bold"
        style="color:#1e293b;">

            Pesanan Saya

        </h2>

        <p style="color:#64748b;">

            Pantau status pesanan dan pembayaran COD Anda

        </p>

    </div>

    @if(session('success'))

        <div class="alert border-0 shadow-sm rounded-4"
        style="background:#dbeafe; color:#1d4ed8;">

            {{ session('success') }}

        </div>

    @endif

    <div class="table-responsive">

        <div class="bg-white p-3 rounded-4 shadow-sm border"
        style="border-color:#dbeafe !important;">

            <table class="table align-middle mb-0">

                <thead>

                    <tr style="color:#334155;">

                        <th class="py-3">No</th>
                        <th>Detail Pesanan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($orders as $order)

                    <tr style="border-color:#eff6ff;">

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <div class="fw-bold mb-1"
                            style="color:#1e293b;">

                                {{ $order->nama_pembeli }}

                            </div>

                            <small style="color:#64748b;">

                                {{ $order->alamat }}

                            </small>

                            <div class="mt-2">

                                @php
                                    $produk = json_decode($order->produk, true);
                                @endphp

                                @if($produk)

                                    @foreach($produk as $nama => $qty)

                                        <span class="badge rounded-pill px-3 py-2 me-1 mb-1"
                                        style="background:#eff6ff; color:#2563eb; border:1px solid #bfdbfe;">

                                            {{ $nama }} x{{ $qty }}

                                        </span>

                                    @endforeach

                                @endif

                            </div>

                        </td>

                        <td class="fw-bold"
                        style="color:#2563eb;">

                            Rp {{ number_format($order->total_harga) }}

                        </td>

                        <td>

                            @if($order->status == 'Diproses')

                                <span class="badge rounded-pill px-3 py-2"
                                style="background:#fef3c7; color:#92400e;">

                                    Diproses

                                </span>

                            @elseif($order->status == 'Dikemas')

                                <span class="badge rounded-pill px-3 py-2"
                                style="background:#dbeafe; color:#1d4ed8;">

                                    Dikemas

                                </span>

                            @elseif($order->status == 'Dikirim')

                                <span class="badge rounded-pill px-3 py-2"
                                style="background:#ede9fe; color:#7c3aed;">

                                    Dikirim

                                </span>

                            @else

                                <span class="badge rounded-pill px-3 py-2"
                                style="background:#dcfce7; color:#15803d;">

                                    Selesai

                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="badge rounded-pill px-3 py-2"
                            style="background:#ec4899;">

                                COD
                            </span>

                        </td>

                        <td style="color:#64748b;">

                            {{ $order->tanggal }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>