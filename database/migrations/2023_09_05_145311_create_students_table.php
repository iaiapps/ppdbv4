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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->name('fk_students_user_id')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('cost_categories_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('cost_category_id')->nullable();
            $table->string('branch')->nullable()->index();
            $table->string('full_name');
            $table->string('nick_name')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('school_origin')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_nisn')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('special_needs')->nullable();
            $table->string('is_hyperactive')->nullable()->default('Tidak');
            $table->string('is_difficult_focus')->nullable()->default('Tidak');
            $table->string('is_impulse_control')->nullable()->default('Tidak');
            $table->string('is_extreme_tantrum')->nullable()->default('Tidak');
            $table->string('needs_shadow_teacher')->nullable()->default('Tidak');
            $table->string('saudara_kandung_di_sdit')->nullable();
            $table->integer('saudara_count')->nullable();
            $table->string('saudara_names')->nullable();
            $table->string('living')->nullable();
            $table->string('address')->nullable();
            $table->string('rtrw')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            // ortu
            $table->string('dad')->nullable();
            $table->string('dad_edu')->nullable();
            $table->string('dad_occupation')->nullable();
            $table->string('dad_income')->nullable();
            $table->string('dad_phone')->nullable();
            $table->string('mom')->nullable();
            $table->string('mom_edu')->nullable();
            $table->string('mom_occupation')->nullable();
            $table->string('mom_income')->nullable();
            $table->string('mom_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
