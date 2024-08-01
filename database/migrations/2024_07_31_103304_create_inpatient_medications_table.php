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
        Schema::create('inpatient_medications', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('hour');
            $table->tinyInteger('checkStatus')->nullable();
            $table->foreignId('patientRoomID')->references('id')->on('patient_rooms');
            $table->foreignId('medicineInsPatientID')->nullable()->references('id')->on('medicine_inspection_patients');
            $table->foreignId('medicalSuppliesInsID')->nullable()->references('id')->on('meidcal_supplies_inspections');
            $table->foreignId('nurseID')->references('id')->on('nurses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inpatient_medications');
    }
};
