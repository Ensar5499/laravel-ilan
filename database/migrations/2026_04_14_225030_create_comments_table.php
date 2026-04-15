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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // Yorumu yapan kullanıcıyı bağladık (cascade sayesinde kullanıcı silinirse yorumu da silinir)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Yorumun hangi ilana yapıldığını bağladık
            $table->foreignId('ad_id')->constrained()->onDelete('cascade');
            
            // Yorum metni
            $table->text('body');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};