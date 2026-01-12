@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Pengeluaran Sparepart</h1>

<p class="mb-4 text-sm text-gray-600">
    Pengeluaran sparepart bersifat permanen dan tidak dapat dikembalikan
</p>

<button class="btn btn-primary mb-4">+ Tambah Pengeluaran</button>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr>
            <th>Sparepart</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keperluan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Bearing 6205</td>
            <td class="text-red-600">-10</td>
            <td>2026-01-08</td>
            <td>Maintenance mesin</td>
        </tr>
    </tbody>
</table>
@endsection
