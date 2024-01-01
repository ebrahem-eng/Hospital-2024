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
        Schema::create('medical_machines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('details');
            $table->tinyInteger('status');
            $table->string('img');
            $table->integer('quantity');
            $table->foreignId('created_by')->references('id')->on('store_keepers');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_machines');
    }
};
