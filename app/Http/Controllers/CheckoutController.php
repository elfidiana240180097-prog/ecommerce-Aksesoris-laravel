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

            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'total' => $request->total,
            'produk' => $request->produk,
            'status' => 'Diproses'

        ]);

        return redirect('/pesanan-saya')
        ->with('success', 'Pesanan berhasil dibuat');
    }

    // HALAMAN PESANAN PEMBELI
    public function pesananSaya()
    {
        $orders = Order::latest()->get();

        return view('pesanan_saya', compact('orders'));
    }
}