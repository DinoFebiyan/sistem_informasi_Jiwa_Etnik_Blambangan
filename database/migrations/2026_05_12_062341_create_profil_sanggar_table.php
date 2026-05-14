<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_sanggar', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('sambutan_pembina')->nullable();
            $table->foreignId('logo_id')->nullable()->constrained('galeri')->nullOnDelete();
            $table->foreignId('foto_pembina_id')->nullable()->constrained('galeri')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sanggar');
    }
};