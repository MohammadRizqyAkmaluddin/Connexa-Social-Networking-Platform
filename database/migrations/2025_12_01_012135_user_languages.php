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
         Schema::create('user_languages', function (Blueprint $table) {
            $table->increments('user_language_id');
            $table->string('user_id', 10);
            $table->integer('language_id')->unsigned();
            $table->string('proficiency_id', 10);
            $table->engine = 'InnoDB';

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')
                ->references('language_id')->on('languages')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proficiency_id')
                ->references('proficiency_id')->on('proficiencies')
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
