<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 191)->primary();       // session ID
            $table->foreignId('user_id')->nullable()->index(); // jika ingin relasi ke users
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');           // data session yang di-serialize
            $table->integer('last_activity')->index(); // timestamp aktivitas terakhir
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};

