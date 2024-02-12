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
        Schema::create('booking', function (Blueprint $table) {
            $table->string('id', 8)->primary();
            $table->string('fullname', 70);
            $table->string('plat', 10);
            $table->string('type', 50);
            $table->string('nohp', 15);
            $table->string('email', 70);
            $table->dateTime('bookingdate');
            $table->enum('bookingstatus', ['0', '1', '2', '3', '4', '5', '6']);
            $table->text('bookingdesc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
