<div id="modalViewBarang"
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-lg p-6 relative shadow-xl">

        {{-- CLOSE --}}
        <button onclick="closeViewModal()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-xl">
            ✕
        </button>

        <h2 class="text-lg font-semibold mb-6">Detail Barang</h2>

        {{-- CONTENT --}}
        <div class="divide-y text-sm">

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Kode Barang</span>
                <span class="font-semibold" id="view_kode"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Nama Barang</span>
                <span class="font-semibold" id="view_nama"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Kategori</span>
                <span class="font-semibold" id="view_kategori"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Kondisi</span>
                <span class="font-semibold" id="view_kondisi"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Stok Total</span>
                <span class="font-semibold" id="view_stok_total"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Stok Tersedia</span>
                <span class="font-semibold" id="view_stok_tersedia"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Dibuat</span>
                <span class="font-semibold" id="view_created_at"></span>
            </div>

            <div class="flex justify-between py-3">
                <span class="text-gray-500">Diperbarui</span>
                <span class="font-semibold" id="view_updated_at"></span>
            </div>

        </div>

        {{-- ACTION --}}
        <div class="flex justify-end mt-6">
            <button onclick="closeViewModal()"
                    class="px-5 py-2 rounded-xl border hover:bg-gray-100">
                Tutup
            </button>
        </div>

    </div>
</div>