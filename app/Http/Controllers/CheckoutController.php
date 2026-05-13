<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        Order::create([

            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'total' => $request->total,
            'produk' => $request->produk

        ]);

        return redirect('/')
        ->with('success', 'Pesanan berhasil dibuat');
    }
}