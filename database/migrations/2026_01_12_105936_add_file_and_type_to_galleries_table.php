<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('file')->after('judul');
            $table->enum('tipe', ['image', 'video'])->after('file');
            $table->dropColumn('gambar');
        });
    }

    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('gambar');
            $table->dropColumn(['file', 'tipe']);
        });
    }
};
