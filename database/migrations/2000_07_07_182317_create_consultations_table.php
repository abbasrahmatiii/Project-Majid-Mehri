<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/2024_07_07_000002_create_consultations_table.php
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultant_id');
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('time_slot_id');
            $table->timestamps();

            $table->foreign('consultant_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('time_slot_id')->references('id')->on('time_slots')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
