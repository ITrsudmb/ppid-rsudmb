<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maklumats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('keterangan'); // ganti dari 'isi'
            $table->string('foto')->nullable(); // ganti dari 'file'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maklumats');
    }
};
