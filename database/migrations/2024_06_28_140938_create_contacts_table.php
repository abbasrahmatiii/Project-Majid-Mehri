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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('working_days')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('facebook_icon')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('telegram_icon')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('whatsapp_icon')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('linkedin_icon')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
