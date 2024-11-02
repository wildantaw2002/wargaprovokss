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
        Schema::table('table_apply', function (Blueprint $table) {
            $table->dropColumn('id_artikel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_apply', function (Blueprint $table) {
            $table->unsignedBigInteger('id_artikel')->after('id_user');
        });
    }
};