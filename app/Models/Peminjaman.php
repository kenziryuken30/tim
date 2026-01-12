<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'item_id',
        'nama_peminjam',
        'kontak',
        'divisi',
        'jumlah',
        'jumlah_kembali',
        'tanggal_pinjam',
        'estimasi_kembali',
        'catatan',
        'status',
    ];

    // relasi ke items
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
