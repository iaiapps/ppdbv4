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
        // Fix column type first: bigInteger (signed) → unsignedBigInteger to match cost_categories.id
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('cost_category_id')->nullable()->change();
        });

        // Then add FK constraint
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

        Schema::table('users', function (Blueprint $table) {
            $table->index('branch');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->index('branch');
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
            $table->bigInteger('cost_category_id')->nullable()->change();
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

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['branch']);
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropIndex(['branch']);
        });
    }
};
