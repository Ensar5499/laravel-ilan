<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Ad $ad)
    {
        // 1. Yorumun boş gitmesini engelle
        $request->validate([
            'body' => 'required|min:3'
        ]);

        // 2. Yorumu veritabanına kaydet
        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'ad_id' => $ad->id,
        ]);

        // 3. Kullanıcıyı geri gönder
        return back()->with('success', 'Yorumunuz eklendi!');
    }
}