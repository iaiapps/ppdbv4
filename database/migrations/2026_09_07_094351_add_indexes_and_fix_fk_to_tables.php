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
        // Fix FK: students.cost_category_id (was raw bigInteger without constraint)
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('cost_category_id')->references('id')->on('cost_categories')->nullOnDelete();
            $table->index('cost_category_id');
        });

        // Add indexes for performance
        Schema::table('documents', function (Blueprint $table) {
            $table->index('user_id');
            $table->index(['user_id', 'type']);
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->index('type');
            $table->index('name');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->index('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['cost_category_id']);
            $table->dropIndex(['cost_category_id']);
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['user_id', 'type']);
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->dropIndex(['type']);
            $table->dropIndex(['name']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['student_id']);
        });
    }
};
