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
        Schema::table('consultation_days', function (Blueprint $table) {
            $table->foreign(['available_day_id'])->references(['id'])->on('available_days')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultation_days', function (Blueprint $table) {
            $table->dropForeign('consultation_days_available_day_id_foreign');
            $table->dropForeign('consultation_days_user_id_foreign');
        });
    }
};
