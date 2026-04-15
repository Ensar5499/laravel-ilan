<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdPolicy
{
    /**
     * Herkes ilan listesini görebilir mi? (Evet, true)
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * İlan detayını herkes görebilir mi? (Evet, true)
     */
    public function view(?User $user, Ad $ad): bool
    {
        return true;
    }

    /**
     * Giriş yapmış her kullanıcı ilan oluşturabilir mi? (Evet, true)
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * İlanı kimler güncelleyebilir?
     */
    public function update(User $user, Ad $ad): bool
    {
        // GÜNCELLEME: Admin ise veya ilanın sahibiyse True döner
        return $user->is_admin || $user->id === $ad->user_id;
    }

    /**
     * İlanı kimler silebilir?
     */
    public function delete(User $user, Ad $ad): bool
    {
        // GÜNCELLEME: Admin ise veya ilanın sahibiyse True döner
        return $user->is_admin || $user->id === $ad->user_id;
    }

    /**
     * Aşağıdaki metodlar şimdilik false kalabilir (Restore/ForceDelete kullanmıyorsan)
     */
    public function restore(User $user, Ad $ad): bool
    {
        return $user->is_admin;
    }

    public function forceDelete(User $user, Ad $ad): bool
    {
        return $user->is_admin;
    }
}