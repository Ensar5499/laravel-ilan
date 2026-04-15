<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'category', 'user_id'];

    // İlan sahibi ilişkisi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Yorumlar ilişkisi (Hata aldığın yer burasıydı)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}