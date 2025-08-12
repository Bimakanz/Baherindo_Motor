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
        Schema::create('mobil_baherindos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->decimal('harga_mobil');
            $table->integer('km_mobil');
            $table->year('tahun_mobil');
            $table->string('gambar_mobil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil_baherindos');
    }
};
