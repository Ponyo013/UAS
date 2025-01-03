<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id') 
                  ->constrained('users') 
                  ->onDelete('cascade'); 
            $table->integer('jumlah_donasi'); 
            $table->string('nama_donatur');
            $table->string('image')->nullable();
            $table->enum('status', ['valid', 'belum_valid', 'tidak_valid'])->default('belum_valid');
            $table->text('deskripsi')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};
