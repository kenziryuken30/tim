<aside class="w-64 bg-slate-900 text-white flex flex-col min-h-screen">

    <!-- Logo -->
    <div class="p-5 border-b border-slate-700">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center font-bold">
                
            </div>
            <div>
                <h1 class="font-bold text-lg">TIM-MAIN</h1>
                <p class="text-xs text-slate-400">Inventory System</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-1 text-sm">
        <a href="/dashboard"class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Dashboard</span></a>
        <a href="/items"class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Data Barang</span></a>
        <a href="/peminjaman"class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Peminjaman</span></a>
        <a href="/pengeluaran" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Pengeluaran Sparepart</span></a>
        <a href="/pengembalian"class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Pengembalian</span></a>
        <a href="/penyesuaian-stok"class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Penyesuaian Stok</span></a>
        <a href="/laporan"class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800"><span>Laporan</span></a>
    </nav>

    <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-slate-700">
        @csrf
        <button
            class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-400 hover:bg-slate-800 hover:text-red-300">
            Logout
        </button>
    </form>

</aside>
