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
        Schema::create('patient_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('enterDate');
            $table->string('leaveDate');
            $table->integer('duration');
            $table->tinyInteger('status');
            $table->foreignId('reservationBy')->references('id')->on('department_employes');
            $table->foreignId('patientID')->references('id')->on('patients');
            $table->foreignId('leaveBy')->nullable()->references('id')->on('department_employes');
            $table->foreignId('roomID')->nullable()->references('id')->on('rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_rooms');
    }
};
