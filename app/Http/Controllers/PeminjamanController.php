<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // 📄 INDEX
    public function index()
    {
        $peminjaman = Peminjaman::with('item')->latest()->get();
        $items = Item::where('stok_tersedia', '>', 0)->get();

        return view('peminjaman.index', compact('peminjaman', 'items'));
    }

    // 💾 STORE
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'nama_peminjam' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'estimasi_kembali' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);

        // cek stok
        if ($request->jumlah > $item->stok_tersedia) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        // simpan peminjaman
        Peminjaman::create([
            'item_id' => $item->id,
            'nama_peminjam' => $request->nama_peminjam,
            'kontak' => $request->kontak,
            'divisi' => $request->divisi,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'estimasi_kembali' => $request->estimasi_kembali,
            'catatan' => $request->catatan,
        ]);

        // kurangi stok
        $item->decrement('stok_tersedia', $request->jumlah);

        return redirect()->back()->with('success', 'Peminjaman berhasil');
    }

    // 🔄 PENGEMBALIAN
    public function kembalikan(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $item = Item::findOrFail($peminjaman->item_id);

        $request->validate([
            'jumlah_kembali' => 'required|integer|min:1',
        ]);

        $sisa = $peminjaman->jumlah - $peminjaman->jumlah_kembali;

        if ($request->jumlah_kembali > $sisa) {
            return back()->with('error', 'Jumlah kembali melebihi sisa');
        }

        // update peminjaman
        $peminjaman->jumlah_kembali += $request->jumlah_kembali;

        if ($peminjaman->jumlah_kembali == $peminjaman->jumlah) {
            $peminjaman->status = 'Selesai';
        } else {
            $peminjaman->status = 'Dikembalikan Sebagian';
        }

        $peminjaman->save();

        // tambah stok
        $item->increment('stok_tersedia', $request->jumlah_kembali);

        return back()->with('success', 'Barang berhasil dikembalikan');
    }
}
