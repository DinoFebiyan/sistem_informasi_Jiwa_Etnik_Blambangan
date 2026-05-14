<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('lokasi');
            $table->string('kategori');
            $table->enum('status', ['selesai', 'belum selesai'])->default('belum selesai');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('galeri_id')->nullable()->constrained('galeri')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};