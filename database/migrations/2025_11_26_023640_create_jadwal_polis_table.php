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
    Schema::create('jadwal_polis', function (Blueprint $table) {
        $table->id();
        $table->string('poli');
        $table->string('hari');
        $table->string('jam_mulai');
        $table->string('jam_selesai');
        $table->unsignedBigInteger('dokter_id')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_polis');
    }
};
