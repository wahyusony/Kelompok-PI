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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->foreign('id_ikan')
                    ->references('id_ikan')->on('ikan')->onDelete('cascade');
            $table->foreign('id_pemasok')
                    ->references('id_pemasok')->on('pemasok')->onDelete('cascade');
            $table->string('jumlah', 100);
            $table->date('tgl_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
