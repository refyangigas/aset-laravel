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
        Schema::table('asets', function (Blueprint $table) {
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->foreign('lokasi_id')->references('id')->on('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
