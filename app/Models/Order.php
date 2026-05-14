<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [

        'nama_pembeli',
        'alamat',
        'total_harga',
        'produk',
        'status',
        'tanggal'

    ];
}