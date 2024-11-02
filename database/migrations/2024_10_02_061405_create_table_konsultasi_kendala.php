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
        Schema::create('table_konsultasi_kendala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsultasi_id')->constrained('table_konsultasi');
            $table->foreignId('jenis_kendala_id')->constrained('table_jenis_kendala_bisnis');
            $table->string("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_konsultasi_kendala');
    }
};
