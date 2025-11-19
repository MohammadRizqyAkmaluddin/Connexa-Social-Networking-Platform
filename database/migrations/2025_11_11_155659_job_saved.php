<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_saved', function(Blueprint $table) {
            $table->integer('job_id')->unsigned();
            $table->string('user_id', 10);
            $table->engine = 'InnoDB';
            $table->primary(['job_id', 'user_id']);

            $table->foreign('job_id')
                ->references('job_id')->on('jobs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')
            ->references('user_id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down(): void
    {
    }
};
