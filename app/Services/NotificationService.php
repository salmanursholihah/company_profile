<?php

namespace App\Services;

use App\Models\AppNotification;
use App\Models\DeviceToken;
use App\Models\SubscriptionInvoice;
use App\Models\User;
use App\Models\UserSubscription;
use App\Services\Fcm\FcmClient;
use Illuminate\Support\Facades\Log;

/**
 * Pintu tunggal notifikasi. Dari mana pun cukup panggil:
 *
 *   app(NotificationService::class)->notify($user, 'tipe', 'Judul', 'Isi', ['screen' => 'subscription']);
 *
 * Notifikasi SELALU disimpan ke kotak masuk (app_notifications), lalu dikirim sebagai
 * push FCM ke semua perangkat user. Kegagalan push TIDAK PERNAH melempar error ke pemanggil
 * (supaya webhook pembayaran tidak ikut gagal).
 */
class NotificationService
{
    public const PAYMENT_SUCCESS       = 'payment_success';
    public const PAYMENT_EXPIRED       = 'payment_expired';
    public const SUBSCRIPTION_GRANTED  = 'subscription_granted';
    public const SUBSCRIPTION_EXPIRING = 'subscription_expiring';
    public const SUBSCRIPTION_EXPIRED  = 'subscription_expired';
    public const GENERAL               = 'general';

    public function __construct(private FcmClient $fcm) {}

    /**
     * @param string|null $dedupeKey  Bila sudah pernah dipakai, notifikasi dilewati (idempotent).
     */
    public function notify(User|int $user, string $type, string $title, string $body, array $data = [], ?string $dedupeKey = null): ?AppNotification
    {
        try {
            $userId = $user instanceof User ? $user->id : $user;

            if ($dedupeKey && AppNotification::where('dedupe_key', $dedupeKey)->exists()) {
                return null;
            }

            $n = AppNotification::create([
                'user_id'    => $userId,
                'type'       => $type,
                'title'      => $title,
                'body'       => $body,
                'data'       => $data ?: null,
                'dedupe_key' => $dedupeKey,
            ]);
        } catch (\Throwable $e) {
            // termasuk balapan unique dedupe_key -> abaikan saja
            Log::warning('Notifikasi: gagal menyimpan', ['type' => $type, 'error' => $e->getMessage()]);
            return null;
        }

        $this->push($n);

        return $n;
    }

    /** Kirim push untuk notifikasi yang sudah tersimpan. */
    public function push(AppNotification $n): void
    {
        try {
            if (! $this->fcm->enabled()) {
                return; // Firebase belum dikonfigurasi: kotak masuk tetap bekerja
            }

            $payload = array_merge($n->data ?? [], [
                'notification_id' => $n->id,
                'type'            => $n->type,
            ]);

            DeviceToken::where('user_id', $n->user_id)->get()->each(function (DeviceToken $dt) use ($n, $payload) {
                $res = $this->fcm->send($dt->token, $n->title, $n->body, $payload);
                if ($res === FcmClient::INVALID) {
                    $dt->delete();
                }
            });
        } catch (\Throwable $e) {
            Log::warning('Notifikasi: push gagal', ['id' => $n->id, 'error' => $e->getMessage()]);
        }
    }

    /* ---------- Pesan siap pakai ---------- */

    public function paymentSuccess(SubscriptionInvoice $invoice, ?UserSubscription $sub = null): void
    {
        $plan  = $invoice->plan->name ?? 'langganan';
        $until = $sub?->expires_at ? ' Langganan aktif sampai ' . $this->date($sub->expires_at) . '.' : '';

        $this->notify(
            $invoice->user_id,
            self::PAYMENT_SUCCESS,
            'Pembayaran berhasil',
            "Pembayaran paket {$plan} sebesar " . $this->rupiah($invoice->total_amount) . " sudah kami terima.{$until}",
            ['screen' => 'subscription', 'invoice_number' => $invoice->invoice_number],
            'payment_success:' . $invoice->invoice_number,
        );
    }

    public function paymentExpired(SubscriptionInvoice $invoice): void
    {
        $this->notify(
            $invoice->user_id,
            self::PAYMENT_EXPIRED,
            'Tagihan kedaluwarsa',
            "Tagihan {$invoice->invoice_number} sudah melewati batas waktu. Pilih paket lagi untuk membuat tagihan baru.",
            ['screen' => 'subscription', 'invoice_number' => $invoice->invoice_number],
            'payment_expired:' . $invoice->invoice_number,
        );
    }

    public function subscriptionGranted(User $user, UserSubscription $sub): void
    {
        $this->notify(
            $user,
            self::SUBSCRIPTION_GRANTED,
            'Langganan diaktifkan',
            'Akses panduan Anda aktif sampai ' . $this->date($sub->expires_at) . '.',
            ['screen' => 'subscription'],
        );
    }

    public function subscriptionExpiring(User $user, UserSubscription $sub, int $daysLeft): void
    {
        $when = $daysLeft <= 1 ? 'besok' : "{$daysLeft} hari lagi";

        $this->notify(
            $user,
            self::SUBSCRIPTION_EXPIRING,
            'Langganan segera berakhir',
            "Langganan Anda berakhir {$when} (" . $this->date($sub->expires_at) . '). Perpanjang agar akses panduan tidak terputus.',
            ['screen' => 'subscription', 'days_left' => $daysLeft],
            "sub_expiring:{$user->id}:{$sub->expires_at->timestamp}:{$daysLeft}",
        );
    }

    public function subscriptionExpired(User $user, UserSubscription $sub): void
    {
        $this->notify(
            $user,
            self::SUBSCRIPTION_EXPIRED,
            'Langganan berakhir',
            'Masa langganan Anda sudah habis. Perpanjang untuk membuka kembali materi panduan.',
            ['screen' => 'subscription'],
            "sub_expired:{$user->id}:{$sub->expires_at->timestamp}",
        );
    }

    protected function rupiah($n): string
    {
        return 'Rp' . number_format((float) $n, 0, ',', '.');
    }

    protected function date($dt): string
    {
        return $dt->copy()->timezone('Asia/Jakarta')->locale('id')->translatedFormat('j F Y');
    }
}
