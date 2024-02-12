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
        Schema::create('spooring', function (Blueprint $table) {
            $table->string('id', 8)->primary();
            $table->string('booking_id', 8);
            $table->unsignedBigInteger('pengguna_id');
            $table->dateTime('spooringdate');
            $table->text('spooringdesc');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('booking')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('pengguna_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spooring');
    }
};
