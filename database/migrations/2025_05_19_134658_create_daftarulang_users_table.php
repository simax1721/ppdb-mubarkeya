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
        Schema::create('daftarulang_users', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->unsignedInteger('users_id');
            $table->text('kk')->nullable();
            $table->text('akte')->nullable();
            $table->text('skl')->nullable();
            $table->text('kartu_kip')->nullable();
            $table->text('kartu_nisn')->nullable();
            $table->text('pasphoto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarulang_users');
    }
};
