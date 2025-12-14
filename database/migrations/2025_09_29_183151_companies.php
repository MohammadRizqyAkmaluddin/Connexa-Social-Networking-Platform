<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Companies extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->string('company_id', 10)->primary();
            $table->string('page_id', 3);
            $table->string('name', 50);
            $table->string('sector', 50);
            $table->string('industry', 50);
            $table->string('tagline', 250)->nullable();
            $table->date('established_date')->nullable();
            $table->string('country', 50);
            $table->string('city', 50);
            $table->text('website')->nullable();
            $table->string('employee');
            $table->text('logo')->nullable();
            $table->text('cover_image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';

            $table->foreign('page_id')
                ->references('page_id')->on('pages')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {

    }
}
