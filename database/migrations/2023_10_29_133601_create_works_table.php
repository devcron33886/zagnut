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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->integer('bar_amount');
            $table->integer('kitchen_amount');
            $table->integer('loss')->default(0);
            $table->integer('paid_loss')->default(0);
            $table->integer('remaining_loss')->default(0);
            $table->integer('bonus')->default(0);
            $table->boolean('status')->default(1);
            $table->integer('percentage');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
