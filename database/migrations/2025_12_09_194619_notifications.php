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
        Schema::create('notifications', function(Blueprint $table) {
            $table->increments('notification_id');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('status')->default('New');
            $table->string('user_id', 10);
            $table->integer('applicant_id')->unsigned()->nullable();
            $table->integer('post_id')->unsigned()->nullable();
            $table->string('sender_id', 10)->nullable();
            $table->datetime('date')->useCurrent();
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('applicant_id')
                  ->references('applicant_id')->on('applicants')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')
                  ->references('post_id')->on('posts')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sender_id')
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
