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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->string('nama', 45);
            $table->double('harga');
            $table->integer('stok');
            $table->integer('rating')->default(0);
            $table->integer('min_stok')->default(0);
            $table->foreignId('jenis_produk_id')->constrained('jenis_produks')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
