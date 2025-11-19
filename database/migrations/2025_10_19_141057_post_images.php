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
        Schema::create('post_images', function(Blueprint $table){
            $table->increments('images_id');
            $table->integer('post_id')->unsigned();
            $table->text('image');
            $table->engine = 'InnoDB';

            $table->foreign('post_id')
                  ->references('post_id')->on('posts')
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
