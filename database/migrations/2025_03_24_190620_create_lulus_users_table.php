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
        Schema::create('lulus_users', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('biodata_users_id');
            $table->unsignedInteger('jurusans_id');
            $table->string('is_daftar_ulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lulus_users');
    }
};
