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
        Schema::create('tbl_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->date('tgl_keluar');
            $table->integer('harga_jual');
            $table->integer('qty_keluar');
            $table->bigInteger('total_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang_keluar');
    }
};
