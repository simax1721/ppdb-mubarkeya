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
        Schema::create('biodata_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('users_id');
            $table->string('nik', 16);
            $table->string('agama', 20);
            $table->string('no_hp', 12);
            $table->text('alamat');
            $table->string('asal_sekolah', 100);
            $table->string('nama_bapak');
            $table->string('nomor_bapak', 12);
            $table->string('nama_ibu');
            $table->string('nomor_ibu', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_users');
    }
};
