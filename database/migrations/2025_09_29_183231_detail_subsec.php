<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailSubsec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_subsec', function (Blueprint $table) {
            $table->increments('sub_section_id');
            $table->integer('job_id')->unsigned();
            $table->string('sub_title', 50);
            $table->engine = 'InnoDB';

            $table->foreign('job_id')
                  ->references('job_id')->on('jobs')
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
