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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('customer_id');

            $table->date('date');
            $table->time('time');
            $table->text('address');
            $table->enum('status', ['pending', 'accepted', 'completed', 'cancelled'])->default('pending');

            $table->double('total_price')->default(0);

            $table->timestamps();

            $table->foreign('worker_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
