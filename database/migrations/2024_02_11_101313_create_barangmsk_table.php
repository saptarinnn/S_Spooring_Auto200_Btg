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
        Schema::create('barangmsk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('pengguna_id');
            $table->integer('jmlhbarangmsk');
            $table->date('tglbarangmsk');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('pengguna_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangmsk');
    }
};
