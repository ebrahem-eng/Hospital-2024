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
        Schema::create('surgeries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('report');
            $table->string('details');
            $table->tinyInteger('status');
            $table->string('surgeriesResult');
            $table->date('surgeriesDate');
            $table->time('surgeriesStartTime');
            $table->time('surgeriesEndTime');
            $table->foreignId('roomID')->references('id')->on('rooms');
            $table->foreignId('inspectionID')->references('id')->on('inspections');
            $table->foreignId('patientID')->references('id')->on('patients');
            $table->foreignId('doctorID')->references('id')->on('doctors');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgeries');
    }
};
