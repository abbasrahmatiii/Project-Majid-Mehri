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
        Schema::table('consultations', function (Blueprint $table) {
            $table->foreign(['consultant_id'])->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['day_id'])->references(['id'])->on('days')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['time_slot_id'])->references(['id'])->on('time_slots')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropForeign('consultations_consultant_id_foreign');
            $table->dropForeign('consultations_day_id_foreign');
            $table->dropForeign('consultations_time_slot_id_foreign');
        });
    }
};
