<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('kode_barang')->unique();
            $table->string('nama_barang');

            $table->enum('kategori', [
                'Alat',
                'Sparepart',
                'Elektronik',
                'Audio',
                'Fotografi',
                'Lainnya'
            ])->default('Lainnya');

            $table->string('kondisi')->default('Baik');

            $table->integer('stok_total')->default(0);
            $table->integer('stok_tersedia')->default(0);
            $table->integer('stok_minimum')->default(0); // ⭐ buat peringatan stok

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
