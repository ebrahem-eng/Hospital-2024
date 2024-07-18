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
        Schema::create('medical_machine_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctorID')->references('id')->on('doctors');
            $table->foreignId('medicalMachineID')->references('id')->on('medical_machines');
            $table->foreignId('storeKeeperID')->nullable()->references('id')->on('store_keepers');
            $table->foreignId('adminID')->nullable()->references('id')->on('admins');
            $table->integer('quantity');
            $table->date('takenDate');
            $table->date('returnDateDoctor');
            $table->tinyInteger('statusStoreKeeperReturned')->nullable();
            $table->date('returnDateStoreKeeper')->nullable();
            $table->string('detailsRequest');
            $table->string('refuseCause')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_machine_requests');
    }
};
