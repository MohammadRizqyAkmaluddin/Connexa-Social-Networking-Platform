<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('user_language', function (Blueprint $table) {
            $table->string('user_id', 10);
            $table->string('language', 50);
            $table->string('proficiency_id', 10);
            $table->string('section_id', 10);
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proficiency_id')
                ->references('proficiency_id')->on('proficiencies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section_id')
                ->references('section_id')->on('sections')
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
