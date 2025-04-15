<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add indexes to districts table
        Schema::table('districts', function (Blueprint $table) {
            $table->index('name');
            $table->index('status');
        });

        // Add indexes to schools table
        Schema::table('schools', function (Blueprint $table) {
            $table->index('name');
            $table->index('district_id');
            $table->index('status');
            $table->index(['district_id', 'status']);
        });

        // Add indexes to kindergartens table
        Schema::table('kindergartens', function (Blueprint $table) {
            $table->index('name');
            $table->index('district_id');
            $table->index('status');
            $table->index(['district_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove indexes from districts table
        Schema::table('districts', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['status']);
        });

        // Remove indexes from schools table
        Schema::table('schools', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['district_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['district_id', 'status']);
        });

        // Remove indexes from kindergartens table
        Schema::table('kindergartens', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['district_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['district_id', 'status']);
        });
    }
};

