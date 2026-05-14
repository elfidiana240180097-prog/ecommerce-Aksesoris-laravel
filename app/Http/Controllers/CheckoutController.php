<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    // SIMPAN PESANAN
    public function store(Request $request)
    {
        Order::create([

            'nama_pembeli' => $request->nama,

            'alamat' => $request->alamat,

            'total_harga' => $request->total,

            'produk' => $request->produk,

            'status' => 'Diproses',

            'tanggal' => now()

        ]);

        return redirect('/pesanan-saya')
        ->with('success', 'Pesanan berhasil dibuat');
    }

    // HALAMAN PESANAN SAYA
    public function pesananSaya()
    {
        $orders = Order::orderBy('tanggal', 'desc')->get();

        return view('pesanan_saya', compact('orders'));
    }
}