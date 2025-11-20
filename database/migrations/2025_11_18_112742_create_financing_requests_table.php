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
            $table->string('transaction_id')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // BU Input
            $table->string('counterparty_name');
            $table->decimal('financing_amount', 15, 2);
            $table->string('currency')->default('USD');
            $table->string('rate_type')->default('Rate Financing');
            $table->date('maturity_date');

            // File uploads
            $table->string('approval_note');
            $table->string('request_letter');

            // Final KLN Rate
            $table->decimal('financing_rate', 5, 2)->nullable();
            // diisi KLN setelah OBN distribusi

            // Status
            $table->enum('status', [
                'pending',          // setelah BU submit
                'assign_to_repair', // TSC return to BU
                'rejected',         // TSC atau KLN
                'approved'          // KLN final approve
            ])->default('pending');
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
