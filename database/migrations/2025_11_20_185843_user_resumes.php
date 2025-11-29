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
        Schema::create('user_resumes', function(Blueprint $table){
            $table->increments('resume_id');
            $table->string('user_id', 10);
            $table->string('resume');
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
