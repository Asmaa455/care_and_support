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
        Schema::create('medical__consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->references('id')->on('patients');
            $table->foreignId('doctor_id')->nullable()->references('id')->on('doctors');
            $table->text('consultation_text');
            $table->boolean('status')->default(false);
            $table->text('answer_text')->default('null');
            $table->boolean('health_data_sharing');
            $table->timestamps();
        });
    }     

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical__consultations');
    }
};
