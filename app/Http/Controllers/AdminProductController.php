<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.produk', compact('products'));
    }

    public function create()
    {
        return view('admin.tambah_produk');
    }

    // TAMBAH PRODUK
    public function store(Request $request)
    {
        // NAMA FILE GAMBAR
        $gambar = time().'.'.$request->gambar->extension();

        // PINDAH GAMBAR KE FOLDER PUBLIC/IMAGES
        $request->gambar->move(
            public_path('images'),
            $gambar
        );

        Product::create([

            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi

        ]);

        return redirect('/admin/produk');
    }

    // FORM EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.edit_produk', compact('product'));
    }

    // UPDATE PRODUK
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // CEK JIKA GAMBAR DIGANTI
        if($request->hasFile('gambar')) {

            $gambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(
                public_path('images'),
                $gambar
            );

        } else {

            $gambar = $product->gambar;
        }

        $product->update([

            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi

        ]);

        return redirect('/admin/produk');
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/admin/produk');
    }
}