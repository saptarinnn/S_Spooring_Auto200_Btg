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
        Schema::table('homepages', function (Blueprint $table) {
            $table->string('head', 150)->nullable(true)->change();
            $table->string('image', 150)->nullable(true)->change();
            $table->string('facebook', 150)->nullable(true)->change();
            $table->string('instagram', 150)->nullable(true)->change();
            $table->string('youtube', 150)->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepages', function (Blueprint $table) {
            //
        });
    }
};
