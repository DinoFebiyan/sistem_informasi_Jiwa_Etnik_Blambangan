<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('isi_berita');
            $table->date('tgl_terbit')->nullable();
            $table->enum('status', ['tayang', 'tidak ditayangkan'])->default('tidak ditayangkan');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('galeri_id')->nullable()->constrained('galeri')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};