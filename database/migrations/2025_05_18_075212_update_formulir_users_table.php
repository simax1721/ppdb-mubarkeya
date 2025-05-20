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
         Schema::table('formulir_users', function (Blueprint $table) {
            // Hapus kolom 'nilai'
            $table->dropColumn('nilai');

            // Tambahkan kolom-kolom baru
            $table->integer('nalquran')->nullable();
            $table->integer('nakademik')->nullable();
            $table->integer('nmikat')->nullable();
            $table->integer('nkejuruan')->nullable();
            $table->string('nkesehatan', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formulir_users', function (Blueprint $table) {
            // Tambahkan kembali kolom 'nilai'
            $table->integer('nilai')->nullable();

            // Hapus kolom-kolom baru
            $table->dropColumn(['nalquran', 'nakademik', 'nmikat', 'nkejuruan', 'nkesehatan']);
        });
    }
};
