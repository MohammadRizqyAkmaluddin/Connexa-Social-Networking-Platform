<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('job_id');
            $table->string('company_id', 10);
            $table->string('title', 50);
            $table->string('employment_id', 2);
            $table->string('mode_id', 2);
            $table->timestamp('created_at')->useCurrent();
            $table->engine = 'InnoDB';

            $table->foreign('company_id')
                ->references('company_id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('employment_id')
                ->references('employment_id')->on('employment')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mode_id')
                ->references('mode_id')->on('modes')
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
