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
        if (!Schema::hasTable('admin')) {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_ktg');
            $table->string('nama_ktg'); 
            $table->timestamps();
        });

        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_prod');
            $table->foreignId('id_ktg');
            $table->string('nama'); 
            $table->bigInteger('harga_day');
            $table->integer('stok');
            $table->string('gambar');
            $table->longText('deskripsi');
            $table->timestamps();

            $table->foreign('id_ktg')
            ->references('id_ktg')
            ->on('kategori')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            });

            Schema::create('sewa', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->foreignId('id');
            $table->foreignId('id_prod');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('total_hari');
            $table->integer('total_harga');
            $table->enum('status', ['pending', 'approved', 'returned', 'canceled'])
                ->default('pending');
            $table->timestamps();
            
            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onUpdate('restrict');

            $table->foreign('id_prod')
                ->references('id_prod')
                ->on('produk')
                ->onUpdate('restrict');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('sewa');
    }
};
