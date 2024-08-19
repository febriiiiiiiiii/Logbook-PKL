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
        Schema::table('pembimbing_sekolahs', function (Blueprint $table) {
            $table->foreignId('jurusan_sekolah_id')->constrained('jurusan_sekolahs')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembimbing_sekolahs', function (Blueprint $table) {
            $table ->dropColumn('jurusan_sekolah_id');
        });
    }
};
