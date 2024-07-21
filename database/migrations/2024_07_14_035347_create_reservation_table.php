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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('travel_id')->nullable();
            $table->date('date');
            $table->integer('total_price');
            $table->integer('duration');
            $table->integer('person');
            $table->string('pickup_location');
            $table->integer('distance_in_km');
            $table->enum('status', ['unpaid', 'paid and pending', 'confirmed', 'canceled', 'rejected', 'finished']);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('destination')->onDelete('cascade');
            $table->foreign('travel_id')->references('id')->on('travel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
