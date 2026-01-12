<div id="modalEditBarang"
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-xl p-6 relative shadow-xl">

        {{-- CLOSE --}}
        <button onclick="closeEditModal()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-xl">
            ✕
        </button>

        <h2 class="text-lg font-semibold mb-6">Edit Barang</h2>

        <form id="formEditBarang" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                {{-- KODE BARANG --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Kode Barang</label>
                    <input type="text"
                           id="edit_kode"
                           name="kode_barang"
                           readonly
                           class="w-full mt-1 px-4 py-3 border rounded-xl
                                  bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                {{-- NAMA BARANG --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text"
                           id="edit_nama"
                           name="nama_barang"
                           class="w-full mt-1 px-4 py-3 border rounded-xl
                                  focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                {{-- KATEGORI --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Kategori</label>
                    <select id="edit_kategori"
                            name="kategori"
                            class="w-full mt-1 px-4 py-3 border rounded-xl
                                   focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option>Alat</option>
                        <option>Sparepart</option>
                        <option>Elektronik</option>
                        <option>Audio</option>
                        <option>Fotografi</option>
                    </select>
                </div>

                {{-- KONDISI --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Kondisi</label>
                    <select id="edit_kondisi"
                            name="kondisi"
                            class="w-full mt-1 px-4 py-3 border rounded-xl
                                   focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option>Baik</option>
                        <option>Rusak Ringan</option>
                        <option>Rusak Berat</option>
                    </select>
                </div>

                {{-- STOK TOTAL --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Stok Total</label>
                    <input type="number"
                           id="edit_stok_total"
                           name="stok_total"
                           min="0"
                           class="w-full mt-1 px-4 py-3 border rounded-xl
                                  focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                {{-- STOK TERSEDIA --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Stok Tersedia</label>
                    <input type="number"
                           id="edit_stok_tersedia"
                           name="stok_tersedia"
                           min="0"
                           class="w-full mt-1 px-4 py-3 border rounded-xl
                                  focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="text-sm font-medium">Stok Minimum</label>
                     <input type="number"
                        id="edit_stok_minimum"
                        name="stok_minimum"
                        min="0"
                        class="w-full border rounded-lg px-3 py-2 mt-1">
                </div>


            </div>

            {{-- ACTION BUTTON --}}
            <div class="flex justify-end gap-4 mt-8">
                <button type="button"
                        onclick="closeEditModal()"
                        class="px-5 py-3 rounded-xl border border-gray-300
                               text-gray-700 hover:bg-gray-100">
                    Batal
                </button>

                <button type="submit"
                        class="px-6 py-3 rounded-xl bg-blue-800
                               text-white hover:bg-blue-900">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>
