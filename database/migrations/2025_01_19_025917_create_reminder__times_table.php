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
        Schema::create('reminder__times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medication__time_id')->references('id')->on('medication__times')->cascadeOnDelete();
            $table->date('date');
            $table->time('time');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminder__times');
    }
};
