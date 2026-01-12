<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();

            // relasi logika ke items (NO FK)
            $table->unsignedBigInteger('item_id');

            $table->string('nama_peminjam');
            $table->string('kontak')->nullable();
            $table->string('divisi')->nullable();

            $table->integer('jumlah');
            $table->integer('jumlah_kembali')->default(0);

            $table->date('tanggal_pinjam');
            $table->date('estimasi_kembali');

            $table->text('catatan')->nullable();

            $table->enum('status', [
                'Dipinjam',
                'Dikembalikan Sebagian',
                'Selesai'
            ])->default('Dipinjam');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
