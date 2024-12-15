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
        //
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->integer('id_jadwal');
            $table->integer('id_bus');
            $table->string('nama');
            $table->string('alamat');
            $table->string('wa');
            $table->date('tanggal');
            $table->string('resi');
            $table->string('total');
            $table->string('keterangan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pesanan');
    }
};
