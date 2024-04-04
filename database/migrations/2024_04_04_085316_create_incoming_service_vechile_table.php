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
        Schema::create('incoming_service_vechile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vechile_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('incoming_service_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('total_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_service_vechile');
    }
};
