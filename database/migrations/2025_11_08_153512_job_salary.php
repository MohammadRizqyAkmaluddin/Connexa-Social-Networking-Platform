<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_salary', function(Blueprint $table) {
            $table->integer('job_id')->unsigned()->primary();
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->engine = 'InnoDB';

            $table->foreign('job_id')
            ->references('job_id')->on('jobs')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        //
    }
};



