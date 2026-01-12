@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold">Peminjaman</h1>

    <button onclick="openModal()"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
        <span class="text-lg">＋</span> Tambah Peminjaman
    </button>
</div>

{{-- SEARCH --}}
<div class="mb-4">
    <form method="GET" action="{{ route('peminjaman.index') }}">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari nama barang atau peminjam..."
               class="w-full md:w-96 border rounded-lg px-4 py-2">
    </form>
</div>

{{-- TABLE CARD --}}
<div class="bg-white rounded-xl shadow">

    <table class="w-full text-sm">
        <thead class="text-gray-500 border-b">
            <tr>
                <th class="px-6 py-4 text-left">Barang</th>
                <th class="px-6 py-4 text-left">Dipinjam Oleh</th>
                <th class="px-6 py-4 text-center">Jumlah</th>
                <th class="px-6 py-4 text-center">Kembali</th>
                <th class="px-6 py-4 text-left">Tanggal Pinjam</th>
                <th class="px-6 py-4 text-left">Estimasi Kembali</th>
                <th class="px-6 py-4 text-center">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @foreach($peminjaman as $row)
            <tr class="hover:bg-gray-50">

                {{-- BARANG --}}
                <td class="px-6 py-4">
                    <div class="font-semibold">
                        {{ $row->item->nama_barang ?? '-' }}
                    </div>
                    <div class="text-xs text-gray-500">
                        {{ $row->item->kode_barang ?? '' }}
                    </div>
                </td>

                {{-- PEMINJAM --}}
                <td class="px-6 py-4">
                    <div class="font-medium">{{ $row->nama_peminjam }}</div>
                    <div class="text-xs text-gray-500">
                        {{ $row->divisi }}
                    </div>
                </td>

                {{-- JUMLAH --}}
                <td class="px-6 py-4 text-center font-semibold">
                    {{ $row->jumlah }}
                </td>

                {{-- KEMBALI --}}
                <td class="px-6 py-4 text-center">
                    {{ $row->jumlah_kembali }} / {{ $row->jumlah }}
                </td>

                {{-- TANGGAL --}}
                <td class="px-6 py-4">
                    {{ $row->tanggal_pinjam }}
                </td>

                <td class="px-6 py-4">
                    {{ $row->estimasi_kembali }}
                </td>

                {{-- STATUS --}}
                <td class="px-6 py-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-medium
                        @if($row->status == 'Dipinjam') bg-yellow-100 text-yellow-700
                        @elseif($row->status == 'Dikembalikan Sebagian') bg-blue-100 text-blue-700
                        @else bg-green-100 text-green-700 @endif">
                        {{ $row->status }}
                    </span>
                </td>

                {{-- AKSI --}}
                <td class="px-6 py-4 text-center">
                    <a href="{{ route('peminjaman.show', $row->id) }}"
                       class="text-gray-600 hover:text-blue-600 text-lg">
                        👁
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div id="modalPinjam"
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-xl p-6 relative">

        <button onclick="closeModal()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            ✕
        </button>

        <h2 class="text-lg font-semibold mb-4">Tambah Peminjaman</h2>

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4">

                <div class="col-span-2">
                    <label class="text-sm">Barang</label>
                    <select name="item_id" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($items as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->kode_barang }} - {{ $item->nama_barang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam"
                           class="w-full border rounded-lg px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label class="text-sm">Divisi</label>
                    <input type="text" name="divisi"
                           class="w-full border rounded-lg px-3 py-2 mt-1">
                </div>

                <div>
                    <label class="text-sm">Jumlah</label>
                    <input type="number" name="jumlah"
                           class="w-full border rounded-lg px-3 py-2 mt-1" min="1">
                </div>

                <div>
                    <label class="text-sm">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam"
                           class="w-full border rounded-lg px-3 py-2 mt-1"
                           value="{{ date('Y-m-d') }}">
                </div>

                <div>
                    <label class="text-sm">Estimasi Kembali</label>
                    <input type="date" name="estimasi_kembali"
                           class="w-full border rounded-lg px-3 py-2 mt-1">
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeModal()"
                        class="px-4 py-2 border rounded-lg">
                    Batal
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() {
    const modal = document.getElementById('modalPinjam');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function closeModal() {
    const modal = document.getElementById('modalPinjam');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

@endsection
