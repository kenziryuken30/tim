<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PT-TMU Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    @include('partials.sidebar')

    <div class="flex-1 flex flex-col">

        @include('partials.navbar')

        <main class="p-6">
            @yield('content')
        </main>

    </div>
</div>

<script>
function openCreate() {
    document.getElementById('modalCreate').classList.remove('hidden');
    document.getElementById('modalCreate').classList.add('flex');
}

function closeCreate() {
    document.getElementById('modalCreate').classList.add('hidden');
}

function openEdit(item) {
    document.getElementById('modalEdit').classList.remove('hidden');
    document.getElementById('modalEdit').classList.add('flex');

    document.getElementById('editForm').action = `/items/${item.id}`;

    document.getElementById('e_kode').value = item.kode;
    document.getElementById('e_nama').value = item.nama;
    document.getElementById('e_kategori').value = item.kategori;
    document.getElementById('e_kondisi').value = item.kondisi;
    document.getElementById('e_total').value = item.stok_total;
    document.getElementById('e_tersedia').value = item.stok_tersedia;
}

function closeEdit() {
    document.getElementById('modalEdit').classList.add('hidden');
}
</script>

</body>
</html>
