<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserEducations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_educations', function (Blueprint $table) {
            $table->string('user_id', 10);
            $table->string('company_id', 10);
            $table->integer('major_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->string('section_id', 10);
            $table->engine = 'InnoDB';

            $table->primary(['user_id', 'major_id']);

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')
                ->references('company_id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('major_id')
                ->references('major_id')->on('majors')
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
