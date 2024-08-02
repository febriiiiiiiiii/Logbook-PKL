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
        Schema::create('jurusan_pembimbing_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembimbing_sekolah_id')->constrained('pembimbing_sekolahs')->restrictOnDelete();
            $table->foreignId('jurusan_sekolah_id')->constrained('jurusan_sekolahs')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan_pembimbing_sekolahs');
    }
};
