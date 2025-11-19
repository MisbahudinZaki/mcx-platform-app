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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            
            // Basic Info
            $table->string('name');           // ex: Bank Mandiri Singapore
            $table->string('status');         // Available / Cut Off

            $table->decimal('available_nostro', 15, 2)->nullable();
            $table->decimal('tf_exposure', 15, 2)->nullable();
            $table->decimal('suggested_rate', 5, 2)->nullable();
            $table->decimal('cof', 5, 2)->nullable();
            $table->decimal('cof_margin', 5, 2)->nullable();

            $table->string('remark')->nullable();
            $table->unsignedTinyInteger('match_confidence')->nullable(); // 0–100%
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
