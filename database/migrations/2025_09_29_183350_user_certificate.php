<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserCertificate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('user_certificate', function (Blueprint $table) {
            $table->increments('certificate_id');
            $table->string('user_id', 10);
            $table->string('company_id', 10);
            $table->string('title', 50);
            $table->string('skill', 50);
            $table->text('description');
            $table->date('issue_date');
            $table->string('credential', 50);
            $table->text('image');
            $table->string('section_id', 10);
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')
                ->references('company_id')->on('companies')
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
