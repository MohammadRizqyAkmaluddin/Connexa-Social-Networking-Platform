<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function(Blueprint $table){
            $table->increments('ads_id')->primary();
            $table->string('company_id', 10);
            $table->text('link');
            $table->string('image_content', 50);
            $table->engine = 'InnoDB';

            $table->foreign('company_id')
                  ->references('company_id')->on('companies')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down(): void
    {
        //
    }
};
