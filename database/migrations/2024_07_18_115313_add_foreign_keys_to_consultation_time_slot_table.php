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
        Schema::table('consultation_time_slot', function (Blueprint $table) {
            $table->foreign(['available_time_slot_id'], 'consultation_time_slots_available_time_slot_id_foreign')->references(['id'])->on('available_time_slots')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['consultation_day_id'], 'consultation_time_slots_consultation_day_id_foreign')->references(['id'])->on('consultation_days')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultation_time_slot', function (Blueprint $table) {
            $table->dropForeign('consultation_time_slots_available_time_slot_id_foreign');
            $table->dropForeign('consultation_time_slots_consultation_day_id_foreign');
        });
    }
};
