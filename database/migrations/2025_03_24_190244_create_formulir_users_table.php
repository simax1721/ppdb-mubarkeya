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
        Schema::create('formulir_users', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->smallInteger('nomor');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('biodata_users_id');
            $table->unsignedInteger('jurusan1');
            $table->string('status_jurusan1')->nullable();
            $table->unsignedInteger('jurusan2');
            $table->string('status_jurusan2')->nullable();
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_users');
    }
};
