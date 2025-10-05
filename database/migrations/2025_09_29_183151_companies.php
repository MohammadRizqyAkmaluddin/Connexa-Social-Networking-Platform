<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Companies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->string('company_id', 10)->primary();
            $table->string('page_id', 3);
            $table->string('name', 50);
            $table->string('industry', 50);
            $table->string('tagline', 250);
            $table->date('established_date');
            $table->string('country', 50);
            $table->string('city', 50);
            $table->text('logo');
            $table->text('cover_image');
            $table->engine = 'InnoDB';

            $table->foreign('page_id')
                ->references('page_id')->on('pages')
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
