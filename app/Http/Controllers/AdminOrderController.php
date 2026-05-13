<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.pesanan', compact('orders'));
    }
}