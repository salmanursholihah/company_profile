<?php

namespace App\Console\Commands;

use App\Models\UserSubscription;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class NotifyExpiringSubscriptions extends Command
{
    protected $signature   = 'subscriptions:notify-expiring';
    protected $description = 'Kirim pengingat langganan (H-7/H-3/H-1) dan pemberitahuan langganan berakhir.';

    public function handle(NotificationService $notif): int
    {
        $reminderDays = array_map('intval', config('subscription.reminder_days', [7, 3, 1]));
        $sent = 0;

        // 1) Masih aktif: kirim bila sisa hari tepat salah satu hari pengingat.
        UserSubscription::with('user')
            ->where('expires_at', '>', now())
            ->where('expires_at', '<=', now()->addDays(max($reminderDays)))
            ->each(function (UserSubscription $sub) use ($notif, $reminderDays, &$sent) {
                $left = (int) ceil(now()->floatDiffInDays($sub->expires_at));
                if ($sub->user && in_array($left, $reminderDays, true)) {
                    $notif->subscriptionExpiring($sub->user, $sub, $left);
                    $sent++;
                }
            });

        // 2) Baru berakhir (2 hari terakhir saja, agar tidak membanjiri akun lama). Dedupe menjamin sekali kirim.
        UserSubscription::with('user')
            ->where('expires_at', '<=', now())
            ->where('expires_at', '>', now()->subDays(2))
            ->each(function (UserSubscription $sub) use ($notif, &$sent) {
                if ($sub->user) {
                    $notif->subscriptionExpired($sub->user, $sub);
                    $sent++;
                }
            });

        $this->info("Selesai. Diproses: {$sent} (yang sudah pernah dikirim otomatis dilewati).");

        return self::SUCCESS;
    }
}
