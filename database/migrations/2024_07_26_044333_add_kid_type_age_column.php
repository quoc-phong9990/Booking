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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('kids');
            $table->integer('kids0To5')->nullable()->after('adults');
            $table->integer('kids6To12')->nullable()->after('kids0To5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('kids')->nullable()->after('adults');
            $table->dropColumn('kids0To5');
            $table->dropColumn('kids6To12');
        });
    }
};
