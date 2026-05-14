<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('katalog', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tari');
            $table->string('kategori');
            $table->integer('stok')->default(0);
            $table->text('deskripsi');
            $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->foreignId('galeri_id')->nullable()->constrained('galeri')->nullOnDelete();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('katalog');
    }
};