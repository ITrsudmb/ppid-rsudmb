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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // contoh: profil, layanan, penunjang, informasi
            $table->string('sub_kategori'); // contoh: sejarah, igd, farmasi, jadwal_poli, dll
            $table->string('judul');
            $table->longText('isi')->nullable();
            $table->string('gambar')->nullable(); // untuk gambar/banner
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
