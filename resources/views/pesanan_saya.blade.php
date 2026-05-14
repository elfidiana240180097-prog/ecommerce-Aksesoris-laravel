<!DOCTYPE html>
<html>
<head>

    <title>Pesanan Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body style="background:#f5f7fb;">

<div class="container mt-5">

    <div class="card border-0 shadow-lg rounded-4 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                Status Pesanan Saya

            </h2>

            <a href="/"
            class="btn btn-dark">

                Kembali

            </a>

        </div>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <table class="table table-bordered align-middle">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Total</th>
                    <th>Status</th>

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

                        @if($order->status == 'Diproses')

                            <span class="badge bg-warning text-dark">

                                Diproses

                            </span>

                        @elseif($order->status == 'Dikemas')

                            <span class="badge bg-info">

                                Dikemas

                            </span>

                        @elseif($order->status == 'Dikirim')

                            <span class="badge bg-primary">

                                Dikirim

                            </span>

                        @else

                            <span class="badge bg-success">

                                Selesai & Sudah Dibayar

                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>