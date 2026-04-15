<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * Veritabanına toplu olarak kaydedilmesine izin verilen alanlar.
     * Bu dizi MassAssignmentException hatasını engeller.
     */
    protected $fillable = [
        'body',    // Yorum içeriği
        'user_id', // Yorumu yazan kullanıcının ID'si
        'ad_id'    // İlgili ilanın ID'si
    ];

    /**
     * İlişki: Her yorum mutlaka bir kullanıcıya aittir.
     * * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * İlişki: Her yorum belirli bir ilana yazılır.
     * * @return BelongsTo
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
    
    /**
     * İsteğe Bağlı: Tarihlerin otomatik olarak Carbon nesnesine 
     * dönüştürülmesini sağlar (Blade içinde ->diffForHumans() kullanabilmen için).
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}