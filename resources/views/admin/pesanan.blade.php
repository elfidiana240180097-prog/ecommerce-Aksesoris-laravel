<!DOCTYPE html>
<html>
<head>

    <title>Data Pesanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body style="background:#f5f7fb;">

<div class="container mt-5">

    <div class="card border-0 shadow-lg rounded-4 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                Data Pesanan Pembeli

            </h2>

            <a href="/admin/dashboard"
            class="btn btn-primary">

                Dashboard

            </a>

        </div>

        <table class="table table-bordered align-middle">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Total</th>
                    <th>Produk</th>

                </tr>

            </thead>

            <tbody>

                @foreach($orders as $order)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $order->nama }}
                    </td>

                    <td>
                        {{ $order->alamat }}
                    </td>

                    <td>
                        Rp {{ number_format($order->total) }}
                    </td>

                    <td>

                        @php
                            $produk = json_decode($order->produk, true);
                        @endphp

                        @foreach($produk as $nama => $qty)

                            <div>

                                {{ $nama }}
                                ({{ $qty }})

                            </div>

                        @endforeach

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>