<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ad;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Admin Paneli Ana Sayfası
     */
    public function index()
    {
        // --- 1. GENEL İSTATİSTİKLER ---
        $stats = [
            'total_users'    => User::count(),
            'total_ads'      => Ad::count(),
            'total_comments' => Comment::count(),
            'new_ads_today'  => Ad::whereDate('created_at', Carbon::today())->count(),
        ];

        // --- 2. SON AKTİVİTELER ---
        // Son kayıt olan 5 kullanıcı
        $latestUsers = User::latest()->take(5)->get();

        // Onay bekleyen veya en son eklenen 5 ilan
        $latestAds = Ad::with('user')->latest()->take(5)->get();

        // En son yapılan 5 yorum
        $latestComments = Comment::with(['user', 'ad'])->latest()->take(5)->get();

        return view('admin.index', compact('stats', 'latestUsers', 'latestAds', 'latestComments'));
    }

    /**
     * Kullanıcıları Yönetme Sayfası
     */
    public function users()
    {
        $users = User::paginate(15); // Sayfalı listeleme
        return view('admin.users', compact('users'));
    }

    /**
     * İlanları Yönetme Sayfası
     */
    public function ads()
    {
        $ads = Ad::with('user')->paginate(15);
        return view('admin.ads', compact('ads'));
    }
}