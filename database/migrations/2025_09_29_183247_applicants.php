<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('applicant_id');
            $table->string('user_id', 10);
            $table->unsignedInteger('job_id');
            $table->text('resume_file');
            $table->text('portfolio_file')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('status')->default('On Progress');
            $table->string('progress')->default('Review');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
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
