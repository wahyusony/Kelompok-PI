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
        Schema::create('ikans', function (Blueprint $table) {
            $table->bigIncrements('id_ikan');
            $table->string('image');
            $table->string('nama_ikan', 100);
            $table->string('jenis_ikan', 100);
            $table->date('tgl_tiba');
            $table->bigInteger('harga');
            $table->foreign('id_pelabuhan')
                    ->references('id_pelabuhan')->on('pelabuhans')->onDelete('cascade');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikans');
    }
};
