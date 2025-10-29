<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('post_id')->unsigned();
            $table->string('user_id', 10);
            $table->text('comment');
            $table->timestamp('created_at')->useCurrent();
            $table->engine = 'InnoDB';

            $table->foreign('post_id')
                  ->references('post_id')->on('posts')
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
