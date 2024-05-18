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
        Schema::table('pengajar', function (Blueprint $table) {
            $table->dropForeign(['id_program']);
            $table->dropColumn('id_program');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            $table->unsignedBigInteger('id_program');

            $table->foreign('id_program')
                        ->references('id')
                        ->on('pengajar')
                        ->onDelete('cascade');
        });
    }
};