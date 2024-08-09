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
            $table->string('comments');
            $table->integer('tour_id');
            $table->integer('user_id');
            $table->foreign('tour_id')->references('id')->on('tours');
            $table->foreign('user_id')->references('id')->on('users');
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
