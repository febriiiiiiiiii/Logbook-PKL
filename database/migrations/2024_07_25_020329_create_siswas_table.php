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
            $table->string('email');
            $table->string('telephone');
            $table->foreignId('angkatan_id')->constrained('angkatans')->onDelete('cascade');
            $table->foreignId('jurusan_pembimbing_sekolah_id')->constrained('jurusan_pembimbing_sekolahs')->onDelete('cascade');
            $table->foreignId('pembimbing_lapangan_id')->constrained('pembimbing_lapangans')->onDelete('cascade');
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
