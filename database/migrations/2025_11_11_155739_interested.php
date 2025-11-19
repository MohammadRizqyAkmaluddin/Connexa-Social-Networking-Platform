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
        Schema::create('interested', function(Blueprint $table){
            $table->string('company_id', 10);
            $table->string('user_id', 10);
            $table->engine = 'InnoDB';

            $table->primary(['company_id', 'user_id']);
            $table->foreign('company_id')
                  ->references('company_id')->on('companies')
                  ->onDelete('cascade')->onUpdate('cascade');
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
