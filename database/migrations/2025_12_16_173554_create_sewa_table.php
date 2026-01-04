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
        Schema::create('sewa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('id_prod');
            $table->integer('total_hari');
            $table->bigInteger('total_harga');
            $table->string('status');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('payment_method');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sewa', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'user_id',
                'id_prod',
                'total_hari',
                'total_harga',
                'status',
                'tgl_mulai',
                'tgl_selesai',
                'payment_method',
                'bukti_pembayaran',
            ]);
        });
    }
};
