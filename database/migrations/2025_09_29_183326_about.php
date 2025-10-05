<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class About extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('about', function (Blueprint $table) {
            $table->string('user_id', 10);
            $table->text('description');
            $table->string('section_id', 10);
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                ->references('user_id')->on('users')
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
