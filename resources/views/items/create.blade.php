{{-- resources/views/items/create.blade.php --}}

<div id="modalTambahBarang"
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-2xl p-8 relative shadow-xl">

        <button onclick="closeModal()"
                class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 text-xl">
            ✕
        </button>

        <h2 class="text-xl font-semibold mb-8">Tambah Barang Baru</h2>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-x-6 gap-y-5">

                <div>
                    <label class="text-sm font-medium">Kode Barang</label>
                    <input name="kode_barang"
                           class="w-full mt-2 px-4 py-3 border rounded-xl"
                           required>
                </div>

                <div>
                    <label class="text-sm font-medium">Nama Barang</label>
                    <input name="nama_barang"
                           class="w-full mt-2 px-4 py-3 border rounded-xl"
                           required>
                </div>

                <div>
                    <label class="text-sm font-medium">Kategori</label>
                    <select name="kategori"
                            class="w-full mt-2 px-4 py-3 border rounded-xl">
                            <option>Alat</option>
                            <option>Sparepart</option>
                            <option>Elektronik</option>
                            <option>Audio</option>
                            <option>Fotografi</option>
                            <option>Lainnya</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Kondisi</label>
                    <select name="kondisi"
                            class="w-full mt-2 px-4 py-3 border rounded-xl">
                        <option>Baik</option>
                        <option>Rusak Ringan</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Stok Total</label>
                    <input type="number"
                           name="stok_total"
                           value="0"
                           class="w-full mt-2 px-4 py-3 border rounded-xl">
                </div>

                <div>
                    <label class="text-sm font-medium">Stok Tersedia</label>
                    <input type="number"
                           name="stok_tersedia"
                           value="0"
                           class="w-full mt-2 px-4 py-3 border rounded-xl">
                </div>

                <div>
                    <label class="text-sm font-medium">Stok Minimum</label>
                    <input type="number"
                        name="stok_minimum"
                        class="w-full border rounded-lg px-3 py-2 mt-1"
                        value="0"
                        min="0">
                </div>


            </div>

            <div class="flex justify-end gap-4 mt-10">
                <button type="button" onclick="closeModal()"
                        class="px-6 py-3 rounded-xl border">
                    Batal
                </button>

                <button class="px-6 py-3 rounded-xl bg-blue-700 text-white">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
