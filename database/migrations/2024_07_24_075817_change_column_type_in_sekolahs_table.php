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
        Schema::table('sekolahs', function (Blueprint $table) {
            //Mengubah tipe data colum alamat menjadi text
            $table->text('alamat')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            //Mengembalikan tipe data colum alamat menjadi string
            $table->string('alamat')->change();
        });
    }
};
