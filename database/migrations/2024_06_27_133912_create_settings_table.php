<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('address')->nullable();
            $table->text('additional_header_tags')->nullable();
            $table->text('additional_footer_tags')->nullable();
            $table->string('seo_site_name')->nullable();
            $table->string('default_keyword')->nullable();
            $table->string('meta_robots')->nullable();
            $table->string('google_analytics')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
