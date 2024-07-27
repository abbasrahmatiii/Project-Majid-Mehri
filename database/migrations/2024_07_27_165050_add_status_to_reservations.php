<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddStatusToReservations extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->tinyInteger('status')->nullable()->default(0);
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
