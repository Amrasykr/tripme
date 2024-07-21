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
        Schema::create('destination', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->enum('category', ['beach', 'mountain', 'city', 'museum', 'lake', 'river', 'forest', 'desert', 'temple', 'palace', 'castle', 'zoo', 'aquarium', 'theme park', 'national park', 'waterfall', 'cave', 'island', 'other']);
            $table->string('address');
            $table->string('address_url')->nullable();
            $table->string('main_image');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->longText('content');
            $table->integer('price');
            $table->integer('capacity_perday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_destination');
    }
};
