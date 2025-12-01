<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('user_skills', function (Blueprint $table) {
            $table->increments('skill_id');
            $table->string('user_id', 10);
            $table->integer('education_id')->unsigned()->nullable();
            $table->integer('experience_id')->unsigned()->nullable();
            $table->string('skill', 50);
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('education_id')
                ->references('education_id')->on('user_educations')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('experience_id')
                ->references('experience_id')->on('user_experiences')
                ->onDelete('cascade')->onUpdate('cascade');
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
