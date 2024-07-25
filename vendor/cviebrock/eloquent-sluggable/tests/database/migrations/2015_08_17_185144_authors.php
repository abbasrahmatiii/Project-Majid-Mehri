<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Class Authors
 */
class Authors extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
<<<<<<< HEAD
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
=======
<<<<<<<< HEAD:vendor/cviebrock/eloquent-sluggable/tests/database/migrations/2015_08_17_185144_authors.php
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
========
        Schema::table('testimonials', function (Blueprint $table) {
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
>>>>>>>> d088776b (add session link):database/migrations/2024_07_18_115313_add_foreign_keys_to_testimonials_table.php
>>>>>>> 2a6be73178200f6ccdcc6653afc94301d72cb567
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
<<<<<<< HEAD
        Schema::drop('authors');
=======
<<<<<<<< HEAD:vendor/cviebrock/eloquent-sluggable/tests/database/migrations/2015_08_17_185144_authors.php
        Schema::drop('authors');
========
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropForeign('testimonials_user_id_foreign');
        });
>>>>>>>> d088776b (add session link):database/migrations/2024_07_18_115313_add_foreign_keys_to_testimonials_table.php
>>>>>>> 2a6be73178200f6ccdcc6653afc94301d72cb567
    }
}
