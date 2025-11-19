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
        Schema::create('financing_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('counterparty_name');
            $table->decimal('financing_amount', 15, 2);
            $table->string('currency')->default('USD');
            $table->string('rate_type')->default('Rate Financing');

            $table->date('maturity_date');

            $table->string('approval_note');     // path file pdf
            $table->string('request_letter');    // path file pdf

            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
            
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financing_requests');
    }
};
