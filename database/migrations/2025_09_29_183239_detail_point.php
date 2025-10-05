<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_point', function (Blueprint $table) {
            $table->increments('detail_point_id');
            $table->integer('sub_section_id')->unsigned();
            $table->string('point', 50);
            $table->engine = 'InnoDB';

            $table->foreign('sub_section_id')
                ->references('sub_section_id')->on('detail_subsec')
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
