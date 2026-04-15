<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Admin yetkisini yönetmek için
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean', // 0/1 değerini true/false yapar
        ];
    }

    /**
     * İlişki Tanımı: Bir kullanıcının birden fazla ilanı olabilir.
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    /**
     * İlişki Tanımı: Bir kullanıcı birden fazla yorum yapabilir.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}