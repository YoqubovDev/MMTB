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
        Schema::table('kindergartens', function (Blueprint $table) {
            $table->renameColumn('oquvchi_soni', 'bolalar_soni');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kindergartens', function (Blueprint $table) {
            $table->renameColumn('bolalar_soni', 'oquvchi_soni');
        });
    }
};
