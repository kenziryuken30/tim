@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-1">Selamat Datang, Operator</h2>
<p class="text-gray-500 mb-6">Berikut ringkasan inventaris hari ini</p>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Barang</p>
        <h2 class="text-2xl font-bold">8</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Barang Tersedia</p>
        <h2 class="text-2xl font-bold">45</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Barang Dipinjam</p>
        <h2 class="text-2xl font-bold">5</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Barang Dikembalikan</p>
        <h2 class="text-2xl font-bold">4</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Pengeluaran</p>
        <h2 class="text-2xl font-bold">15</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Stok Menipis</p>
        <h2 class="text-2xl font-bold text-red-500">2</h2>
    </div>
</div>

{{-- Perhatian --}}
<div class="grid md:grid-cols-2 gap-4 mb-6">
    <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-xl">
        ⚠️ <b>2</b> Pinjaman belum selesai
    </div>
    <div class="bg-red-50 border border-red-200 p-4 rounded-xl">
        ❗ <b>3</b> Barang mendekati minimum stok
    </div>
</div>

{{-- Aksi cepat --}}
<div class="bg-white p-5 rounded-xl shadow">
    <h3 class="font-semibold mb-4">Aksi Cepat</h3>

    <div class="grid md:grid-cols-4 gap-4 text-sm">
        <a class="border p-4 rounded-lg hover:bg-gray-50" href="/items/create">➕ Tambah Barang</a>
        <a class="border p-4 rounded-lg hover:bg-gray-50" href="/peminjaman/create">📦 Catat Peminjaman</a>
        <a class="border p-4 rounded-lg hover:bg-gray-50" href="/pengeluaran/create">📤 Catat Pengeluaran</a>
        <a class="border p-4 rounded-lg hover:bg-gray-50" href="/laporan">📄 Lihat Laporan</a>
    </div>
</div>
@endsection
