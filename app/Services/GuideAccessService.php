<?php

namespace App\Services;

use App\Models\GuideLesson;
use App\Models\User;

/**
 * SATU-SATUNYA penentu akses materi.
 * Dipakai API (daftar -> flag "locked", detail -> 403) dan admin.
 */
class GuideAccessService
{
    public const LOGIN_REQUIRED        = 'login_required';
    public const SUBSCRIPTION_REQUIRED = 'subscription_required';

    /** @return null bila boleh, atau kode penolakan. */
    public function denyReason(?User $user, GuideLesson $lesson): ?string
    {
        if ($lesson->is_free) {
            return null;
        }
        if (! $user) {
            return self::LOGIN_REQUIRED;
        }
        if ($user->role === 'super_admin') {
            return null;
        }

        return $user->hasActiveSubscription() ? null : self::SUBSCRIPTION_REQUIRED;
    }

    public function canAccess(?User $user, GuideLesson $lesson): bool
    {
        return $this->denyReason($user, $lesson) === null;
    }

    public function message(string $code): string
    {
        return $code === self::LOGIN_REQUIRED
            ? 'Masuk atau daftar akun untuk membuka materi ini.'
            : 'Materi ini khusus pelanggan premium. Berlangganan untuk membukanya.';
    }
}
