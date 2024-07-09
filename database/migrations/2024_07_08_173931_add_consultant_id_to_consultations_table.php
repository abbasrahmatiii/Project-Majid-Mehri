<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConsultantIdToConsultationsTable extends Migration
{
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->foreignId('consultant_id')->constrained('users')->after('id');
        });
    }

    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropForeign(['consultant_id']);
            $table->dropColumn('consultant_id');
        });
    }
}
