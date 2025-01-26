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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->time('time')->nullable();
            $table->date('date')->nullable(); //Date
            $table->foreignId('customer_id');// doctor
            $table->boolean('is_joint')->default(false);
            $table->foreignId('employee_id')->constrained('users'); // emp referencing users
            $table->foreignId('joint_id')->nullable()->constrained('users'); // joint_id referencing users
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
