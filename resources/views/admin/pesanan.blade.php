<!DOCTYPE html>
<html>
<head>

    <title>Data Pesanan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body style="background:#f1f5f9;">

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3 logo-brand">

            GlowStyle Admin

        </a>

        <a href="/admin/dashboard"
        class="btn btn-dark px-4">

            Dashboard

        </a>

    </div>

</nav>

<div class="container mt-5">

    <div class="card border-0 shadow-lg rounded-4 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    Data Pesanan

                </h2>

                <p class="text-secondary mb-0">

                    Kelola status pesanan pembeli

                </p>

            </div>

            <div class="bg-primary text-white px-4 py-3 rounded-4 text-center">

                <h5 class="mb-0">

                    {{ count($orders) }}

                </h5>

                <small>Total Pesanan</small>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table align-middle table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Alamat</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th width="220">Update</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <div class="fw-bold">

                                {{ $order->nama_pembeli }}

                            </div>

                        </td>

                        <td>

                            {{ $order->alamat }}

                        </td>

                        <td>

                            @php
                                $produk = json_decode($order->produk, true);
                            @endphp

                            @if($produk)

                                @foreach($produk as $nama => $qty)

                                    <div class="mb-1">

                                        <span class="badge bg-light text-dark border">

                                            {{ $nama }} ({{ $qty }})
                                        </span>

                                    </div>

                                @endforeach

                            @else

                                <span class="text-danger">

                                    Produk tidak tersedia

                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="fw-bold text-primary">

                                Rp {{ number_format($order->total_harga) }}

                            </span>

                        </td>

                        <td>

                            @if($order->status == 'Diproses')

                                <span class="badge bg-warning text-dark px-3 py-2">

                                    Diproses

                                </span>

                            @elseif($order->status == 'Dikemas')

                                <span class="badge bg-info px-3 py-2">

                                    Dikemas

                                </span>

                            @elseif($order->status == 'Dikirim')

                                <span class="badge bg-primary px-3 py-2">

                                    Dikirim

                                </span>

                            @else

                                <span class="badge bg-success px-3 py-2">

                                    Selesai

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $order->tanggal }}

                        </td>

                        <td>

                            <form
                            action="/admin/update-status/{{ $order->id }}"
                            method="POST">

                                @csrf

                                <select
                                name="status"
                                class="form-select mb-2">

                                    <option value="Diproses"
                                    {{ $order->status == 'Diproses' ? 'selected' : '' }}>

                                        Diproses

                                    </option>

                                    <option value="Dikemas"
                                    {{ $order->status == 'Dikemas' ? 'selected' : '' }}>

                                        Dikemas

                                    </option>

                                    <option value="Dikirim"
                                    {{ $order->status == 'Dikirim' ? 'selected' : '' }}>

                                        Dikirim

                                    </option>

                                    <option value="Selesai"
                                    {{ $order->status == 'Selesai' ? 'selected' : '' }}>

                                        Selesai

                                    </option>

                                </select>

                                <button
                                class="btn btn-success w-100">

                                    Update Status

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="text-center py-4">

                            Belum ada pesanan

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>