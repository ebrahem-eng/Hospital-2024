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
        Schema::create('doctor_time_availables', function (Blueprint $table) {
            $table->id();
            $table->string('dayName');
            $table->time('startTime');
            $table->time('endTime');
            $table->integer('inspectionDuration');
            $table->foreignId('doctorID')->references('id')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_time_availables');
    }
};
