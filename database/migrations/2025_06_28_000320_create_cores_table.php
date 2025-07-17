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
        Schema::create('cores', function (Blueprint $table) {
     $table->id();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->string('core_value')->nullable();
            $table->text('words')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable(); // For storing image path
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // assuming a users table exists
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cores');
    }
};
