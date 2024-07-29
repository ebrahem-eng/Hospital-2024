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
        Schema::create('meidcal_supplies_inspections', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('inspectionID')->references('id')->on('inspections')->cascadeOnDelete();
            $table->foreignId('medicalSuppliesID')->references('id')->on('medical_supplies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meidcal_supplies_inspections');
    }
};
