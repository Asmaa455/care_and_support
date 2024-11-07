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
        Schema::create('medication__times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->references('id')->on('patients');
            $table->string('medication_name');
            $table->string('amount');
            $table->time('time_of_taking_the_drug');
            $table->integer('daily_repetition');
            $table->date('start_date');
            $table->integer('duration_of_taking_the_drug');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication__times');
    }
};
