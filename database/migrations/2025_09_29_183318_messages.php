<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->string('sender_id', 10);
            $table->string('receiver_id', 10);
            $table->text('message');
            $table->timestamp('created_at')->useCurrent();
            $table->engine = 'InnoDB';

            $table->foreign('sender_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('receiver_id')
                ->references('user_id')->on('users')
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
