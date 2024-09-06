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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_hospital_id')->constrained('doctor_hospital')->onDelete('cascade'); // FK to doctor_hospital table
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('patient_channel_time_avg'); // assuming this is in minutes
            $table->decimal('price', 8, 2); // adjust precision and scale based on your need
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
