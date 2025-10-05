<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 10)->primary();
            $table->string('name', 50);
            $table->string('phone_number', 20);
            $table->string('gender', 50);
            $table->date('dob');
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('email', 50);
            $table->string('password', 255);
            $table->string('headline', 255)->default('--');
            $table->string('profile_image', 255)->default('empty_user_profile.png');
            $table->string('cover_image', 255)->default('empty_user_cover.png');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
