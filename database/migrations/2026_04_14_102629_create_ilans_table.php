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
        Schema::create('ilans', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');    // İlanın başlığı (Örn: Satılık Araba)
            $table->text('aciklama');    // İlanın detaylı açıklaması
            $table->decimal('fiyat', 15, 2); // Fiyat (Örn: 750000.00)
            $table->string('sehir');     // Hangi şehirde olduğu
            $table->timestamps();        // Oluşturulma ve güncellenme tarihi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilans');
    }
};