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
        Schema::create('liter_combinations', function (Blueprint $table) {
            $table->id();
            $table->string('liter')->nullable();
            $table->foreignId('car_year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('engine_id')->constrained()->cascadeOnDelete();
            $table->string('engineoil')->nullable();
            $table->string('oil_capicity')->nullable();
            $table->string('oil_plug_torque')->nullable();
            $table->string('auto_transimission_fuild')->nullable();
            $table->string('rear_differential')->nullable();
            $table->string('Tansfer_case')->nullable();
            $table->string('wheel_torque')->nullable();
            $table->string('oil_life_instruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liter_combinations');
    }
};
