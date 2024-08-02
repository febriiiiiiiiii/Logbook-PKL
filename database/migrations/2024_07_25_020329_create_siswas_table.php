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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->foreignId('angkatan_id')->constrained('angkatans')->restrictOnDelete();
            $table->foreignId('jurusan_pembimbing_sekolah_id')->constrained('jurusan_pembimbing_sekolahs')->restrictOnDelete();
            $table->foreignId('pembimbing_lapangan_id')->constrained('pembimbing_lapangans')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
