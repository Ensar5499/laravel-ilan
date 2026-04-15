<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        // Tüm ilanları son eklenenden başlayarak getirir
        $ads = Ad::with('user')->latest()->get();
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        // Gelen verileri doğrula
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required',
        ]);

        // Giriş yapan kullanıcının ilanlarına veriyi kaydet
        auth()->user()->ads()->create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        // İlan eklenince direkt vitrine (ana sayfaya) gönderiyoruz
        return redirect('/')->with('success', 'İlanınız başarıyla vitrine eklendi!');
    }

    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    public function destroy(Ad $ad)
    {
        // GÜNCELLEME: Eğer kullanıcı adminse VEYA ilanın sahibiyse silebilir
        if (auth()->user()->is_admin || auth()->id() === $ad->user_id) {
            $ad->delete();
            return redirect()->back()->with('success', 'İlan başarıyla kaldırıldı.');
        }

        abort(403, 'Bu ilanı silme yetkiniz yok!');
    }
}