<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

            Schema::create('tour_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_id')->constrained()->on('tours');
                $table->string('image');
                $table->timestamps();
            });
        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_images');
    }
};
