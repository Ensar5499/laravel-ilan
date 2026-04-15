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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            // İlanı hangi kullanıcı verdiyse onun ID'sini otomatik eşleştirir
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('title');        // İlan Başlığı (Örn: Satılık Araba)
            $table->text('description');    // Açıklama
            $table->decimal('price', 10, 2); // Fiyat (Örn: 500.000,50)
            $table->string('category');     // Kategori (Vasıta, Emlak vb.)
            $table->timestamps();           // Oluşturulma tarihi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};