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
        Schema::create('pemasoks', function (Blueprint $table) {
            $table->bigIncrements('id_pemasok');
            $table->string('nama_pemasok', 100);
            $table->string('alamat', 100);
            $table->string('kontak', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasoks');
    }
};
