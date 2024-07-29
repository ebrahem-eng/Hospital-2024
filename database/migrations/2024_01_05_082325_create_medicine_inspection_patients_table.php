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
        Schema::create('medicine_inspection_patients', function (Blueprint $table) {
            $table->id();
            $table->integer('repeat_day');
            $table->integer('duration');
            $table->integer('quantity');
            $table->string('daily_appointment');
            $table->string('details');
            $table->foreignId('medicineID')->references('id')->on('medicines');
            $table->foreignId('patientID')->references('id')->on('patients');
            $table->foreignId('inspectionID')->references('id')->on('inspections')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_inspection_patients');
    }
};
