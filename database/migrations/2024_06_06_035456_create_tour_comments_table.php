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

            Schema::create('tour_comments', function (Blueprint $table) {
                $table->id();
                $table->string('comments')->nullable();
                $table->integer('tour_id')->nullable();
                $table->string('name')->nullable();
                $table->timestamps();

            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_comments');
    }
};
