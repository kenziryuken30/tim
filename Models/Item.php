<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'kondisi',
        'stok_total',
        'stok_tersedia',
        'stok_minimum',
        'deskripsi',
    ];

    // relasi logika (tanpa FK)
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'item_id');
    }
}
