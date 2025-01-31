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
            $table->foreignId('user_id');// employee who added customer
            $table->enum('type',['doctor', 'distributor','chemist']);
            $table->boolean('is_approved')->default(false);
            $table->foreignId('specialty_id')->nullable();
            $table->json('contact')->nullable();
            $table->foreignId('area_id')->nullable();
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
