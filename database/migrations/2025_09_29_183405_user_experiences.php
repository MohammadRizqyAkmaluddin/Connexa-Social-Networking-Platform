<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('user_experiences', function (Blueprint $table) {
            $table->increments('experience_id');
            $table->string('user_id', 10);
            $table->string('company_id', 10);
            $table->string('title', 50);
            $table->string('position', 50);
            $table->string('employment_id', 2);
            $table->string('mode_id', 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('section_id', 10);
            $table->engine = 'InnoDB';

            $table->foreign('employment_id')
                ->references('employment_id')->on('employment')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')
                ->references('company_id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mode_id')
                ->references('mode_id')->on('modes')
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
