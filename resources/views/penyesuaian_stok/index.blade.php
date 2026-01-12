@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Penyesuaian Stok</h1>

<button class="btn btn-primary mb-4">+ Tambah Penyesuaian Stok</button>

<table class=" w-full bg-white rounded shadow">
    <thead>
        <tr>
            <th>Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Alasan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Bearing 6205</td>
            <td class="text-red-600">Pengurangan</td>
            <td>-5</td>
            <td>Stok rusak</td>
        </tr>
    </tbody>
</table>
@endsection