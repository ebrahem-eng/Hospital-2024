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
        Schema::create('patient_medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctorID')->references('id')->on('doctors');
            $table->foreignId('paitentID')->references('id')->on('patients');
            $table->foreignId('created_by_receptionist')->nullable()->references('id')->on('receptions');
            $table->foreignId('created_by_doctor')->nullable()->references('id')->on('doctors');
            $table->string('details');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_medical_records');
    }
};
