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
        Schema::create('doctor_hospital', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); // Foreign key to doctors table
            $table->foreignId('hospital_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table where type is hospital

            // Channeling Details
            $table->string('channel_name'); // Channel name
            $table->time('start_time');     // Start time
            $table->time('end_time');       // End time
            $table->integer('avg_time');    // Average time in minutes

            // Weekdays (nullable columns)
            $table->string('sunday')->nullable();    // Sunday
            $table->string('monday')->nullable();    // Monday
            $table->string('tuesday')->nullable();   // Tuesday
            $table->string('wednesday')->nullable(); // Wednesday
            $table->string('thursday')->nullable();  // Thursday
            $table->string('friday')->nullable();    // Friday
            $table->string('saturday')->nullable();  // Saturday

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_hospital');
    }
};
