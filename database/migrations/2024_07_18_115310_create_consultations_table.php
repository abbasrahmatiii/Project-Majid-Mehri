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
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consultant_id')->index('consultations_consultant_id_foreign');
            $table->integer('price');
            $table->unsignedBigInteger('day_id')->nullable()->index('consultations_day_id_foreign');
            $table->unsignedBigInteger('time_slot_id')->index('consultations_time_slot_id_foreign');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
