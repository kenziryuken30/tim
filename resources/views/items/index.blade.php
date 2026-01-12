@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    {{-- TOP ACTION --}}
    <div class="flex justify-between items-center mb-6">

                {{-- SEARCH + RESET --}}
        <form method="GET"
              action="{{ route('items.index') }}"
              class="flex items-center gap-3">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari kode atau nama barang..."
                   class="border rounded-lg px-4 py-2 w-64">

            {{-- RESET (MUNCUL JIKA ADA QUERY) --}}
            @if(request()->has('search') && request('search') !== '')
                <a href="{{ route('items.index') }}"
                   class="px-4 py-2 border rounded-lg text-sm hover:bg-gray-100 transition">
                    Reset
                </a>
            @endif
        </form>

        {{-- ACTION --}}
        <div class="flex gap-3">
            <button class="border px-4 py-2 rounded-lg">Import Excel</button>
            <button class="border px-4 py-2 rounded-lg">Export Excel</button>

            <button type="button"
                    onclick="openModal()"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Tambah Barang
            </button>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="border-b text-gray-500">
                <tr>
                    <th class="py-3 text-left">Kode Barang</th>
                    <th class="py-3 text-left">Nama Barang</th>
                    <th class="py-3 text-left">Kategori</th>
                    <th class="py-3 text-left">Kondisi</th>
                    <th class="py-3 text-center">Stok</th>
                    <th class="py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
            @foreach($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 font-semibold">{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>

                    <td>
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-xs">
                            {{ $item->kategori ?? '-' }}
                        </span>
                    </td>

                    <td>{{ $item->kondisi ?? 'Baik' }}</td>

                    <td class="text-center font-semibold">
                        {{ $item->stok_tersedia }} / {{ $item->stok_total }}
                        @if($item->stok_tersedia <= $item->stok_minimum)
                            <div class="text-red-600 text-xs font-semibold mt-1">
                                ⚠ Stok menipis
                            </div>
                        @endif
                    </td>

                    <td class="text-center space-x-3">
                         <button type="button"
                            class="text-gray-700 hover:text-gray-900 view-btn"
                            data-item='@json($item)'>
                        👁
                    </button>

                        <button type="button"
                                class="text-blue-600 hover:text-blue-800 edit-btn"
                                data-item='@json($item)'>
                            ✏️
                        </button>

                        <form action="{{ route('items.destroy', $item->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Hapus barang ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">🗑</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- ================= MODAL  ================= --}}
@include('items.create')
@include('items.edit')
@include('items.view')


{{-- ================= JS ================= --}}
<script>
function openModal() {
    const modal = document.getElementById('modalTambahBarang');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('modalTambahBarang');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.edit-btn');
    if (!btn) return;

    const item = JSON.parse(btn.dataset.item);
    const modal = document.getElementById('modalEditBarang');

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.getElementById('edit_kode').value = item.kode_barang;
    document.getElementById('edit_nama').value = item.nama_barang;
    document.getElementById('edit_kategori').value = item.kategori;
    document.getElementById('edit_kondisi').value = item.kondisi;
    document.getElementById('edit_stok_total').value = item.stok_total;
    document.getElementById('edit_stok_tersedia').value = item.stok_tersedia;
    document.getElementById('edit_stok_minimum').value = item.stok_minimum ?? 0;

    document.getElementById('formEditBarang').action = /items/${item.id};
});

function closeEditModal() {
    const modal = document.getElementById('modalEditBarang');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.view-btn');
    if (!btn) return;

    const item = JSON.parse(btn.dataset.item);
    const modal = document.getElementById('modalViewBarang');

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.getElementById('view_kode').innerText = item.kode_barang;
    document.getElementById('view_nama').innerText = item.nama_barang;
    document.getElementById('view_kategori').innerText = item.kategori ?? '-';
    document.getElementById('view_kondisi').innerText = item.kondisi ?? '-';
    document.getElementById('view_stok_total').innerText = item.stok_total;
    document.getElementById('view_stok_tersedia').innerText = item.stok_tersedia;

    document.getElementById('view_created_at').innerText =
        new Date(item.created_at).toISOString().slice(0, 10);

    document.getElementById('view_updated_at').innerText =
        new Date(item.updated_at).toISOString().slice(0, 10);
});

function closeViewModal() {
    const modal = document.getElementById('modalViewBarang');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

@endsection
