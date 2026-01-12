@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Laporan</h1>

<div class="bg-white p-4 rounded shadow mb-4">
    <input type="date">
    <input type="date">
    <select><option>Semua</option></select>
    <button class="btn btn-primary">Filter</button>
</div>

<button class="btn btn-secondary">Export Excel</button>
<button class="btn btn-secondary">Export PDF</button>
@endsection