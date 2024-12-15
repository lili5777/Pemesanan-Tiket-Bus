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
        Schema::create('kursi', function (Blueprint $table) {
            $table->id('id_kursi');
            $table->integer('id_bis');
            $table->string('nomor_kursi');
            $table->enum('status', ['terisi', 'tidak terisi'])->default('tidak terisi');
            $table->date('tanggal');
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
        Schema::dropIfExists('kursi');
    }
};
