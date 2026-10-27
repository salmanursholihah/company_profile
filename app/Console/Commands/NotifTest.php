<?php

namespace App\Console\Commands;

use App\Models\DeviceToken;
use App\Models\User;
use App\Services\Fcm\FcmClient;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class NotifTest extends Command
{
    protected $signature   = 'notif:test {email} {--title=Tes notifikasi} {--body=Jika Anda melihat ini, push FCM berfungsi.} {--screen=subscription}';
    protected $description = 'Kirim notifikasi uji ke satu pengguna (untuk cek konfigurasi Firebase).';

    public function handle(NotificationService $notif, FcmClient $fcm): int
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (! $user) {
            $this->error('User tidak ditemukan.');
            return self::FAILURE;
        }

        $this->line('Firebase terkonfigurasi : ' . ($fcm->enabled() ? 'YA' : 'TIDAK (cek FIREBASE_CREDENTIALS / config:clear)'));
        $this->line('Perangkat terdaftar     : ' . DeviceToken::where('user_id', $user->id)->count());

        $n = $notif->notify($user, NotificationService::GENERAL, $this->option('title'), $this->option('body'), ['screen' => $this->option('screen')]);

        $this->info($n ? "Notifikasi #{$n->id} dibuat dan dikirim." : 'Gagal membuat notifikasi (lihat storage/logs/laravel.log).');

        return self::SUCCESS;
    }
}
