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
        Schema::table('available_time_slots', function (Blueprint $table) {
            $table->foreign(['available_day_id'])->references(['id'])->on('available_days')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('available_time_slots', function (Blueprint $table) {
            $table->dropForeign('available_time_slots_available_day_id_foreign');
        });
    }
};
