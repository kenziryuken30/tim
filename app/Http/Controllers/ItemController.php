<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Tampilkan daftar barang
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->get();
        return view('items.index', compact('items'));
    }

    /**
     * Tampilkan form tambah barang
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Simpan barang baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang',
            'nama_barang' => 'required',
            'stok_total'  => 'required|integer|min:0',
        ]);

        Item::create([
            'kode_barang'   => $request->kode_barang,
            'nama_barang'   => $request->nama_barang,
            'stok_total'    => $request->stok_total,
            'stok_tersedia' => $request->stok_total, // awal sama dengan total
        ]);

        return redirect('/items')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit barang
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update data barang
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok_total'  => 'required|integer|min:0',
        ]);

        // hitung ulang stok tersedia jika stok total berubah
        $selisih = $request->stok_total - $item->stok_total;

        $item->update([
            'nama_barang'   => $request->nama_barang,
            'stok_total'    => $request->stok_total,
            'stok_tersedia' => $item->stok_tersedia + $selisih,
        ]);

        return redirect('/items')->with('success', 'Barang berhasil diupdate');
    }

    /**
     * Hapus barang
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/items')->with('success', 'Barang berhasil dihapus');
    }
}
