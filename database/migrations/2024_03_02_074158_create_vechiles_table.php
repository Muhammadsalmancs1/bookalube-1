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
        Schema::create('vechiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('car_name')->nullable();
            $table->string('kilometer')->nullable();
            $table->foreignId('car_year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('engine_id')->constrained()->cascadeOnDelete();
            $table->foreignId('engine_oil_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('engine_oil_filter')->nullable();
            $table->string('fuel_filter')->nullable();
            $table->string('oil_filter')->nullable();
            $table->string('transmission_filter')->nullable();
            $table->foreignId('air_filter_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vechiles');
    }
};
