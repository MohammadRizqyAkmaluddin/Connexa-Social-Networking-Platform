<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanyRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_roles', function (Blueprint $table) {
            $table->string('user_id', 10);
            $table->string('company_id', 10);
            $table->string('role', 50);
            $table->engine = 'InnoDB';

            $table->primary(['user_id', 'company_id']);

            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')
                ->references('company_id')->on('companies')
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
