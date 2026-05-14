<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeri', function (Blueprint $table) {
        $table->id();
        $table->string('judul')->nullable(); 
        $table->longText('file_blob'); 
        $table->string('nama_file');
        $table->string('kategori_modul'); 
        $table->string('sumber')->nullable(); 
        $table->boolean('is_watermark')->default(false);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
