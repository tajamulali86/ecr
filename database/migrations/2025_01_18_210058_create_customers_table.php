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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->nullable();// employee who added customer
            $table->enum('type',['doctor', 'distributor','chemist']);
            $table->boolean('is_approved')->default(false);
            $table->foreignId('specialty_id')->nullable();
            $table->json('contact')->nullable();
            $table->foreignId('region_id')->nullable();
            $table->date('last_visited')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
