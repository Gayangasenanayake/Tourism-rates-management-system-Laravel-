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
        Schema::create('hotel_rates', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('value');
            $table->foreignId('hotel_id')->references('id')->on('insider_360_live.hotels');
            $table->foreignId('room_type_id')->references('id')->on('room_types');
            $table->foreignId('board_type_id')->references('id')->on('insider_360_live.board_types');
            $table->foreignId('agent_id')->references('id')->on('insider_360_live.agents');
            $table->foreignId('room_category_id')->references('id')->on('insider_360_live.room_categories');
            $table->foreignId('currency_id')->references('id')->on('currencies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rates');
    }
};
