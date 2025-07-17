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
        Schema::create('loans', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relation to users table
            $table->foreignId('client_id')->constrained()->onDelete('cascade');  // Relation to users table
            $table->decimal('amount', 15, 2)->nullable(); // Loan amount
            $table->decimal('interest_rate', 5, 2)->nullable(); // Interest rate (e.g., 5.00 for 5%)
            $table->integer('term')->nullable(); // Loan term in months
            $table->date('start_date')->nullable(); // Loan start date
            $table->date('due_date')->nullable(); // Loan due date
            $table->enum('status', ['pending', 'approved', 'rejected', 'closed'])->nullable(); // Loan status
            $table->decimal('total_repayable', 15, 2)->nullable(); // Total amount to be repaid (including interest)
            $table->decimal('amount_paid', 15, 2)->default(0)->nullable(); // Amount already paid
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
