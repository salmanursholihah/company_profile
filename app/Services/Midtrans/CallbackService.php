<?php

namespace App\Services\Midtrans;

use App\Models\SubscriptionInvoice;
use Midtrans\Notification;

class CallbackService extends Midtrans
{
    protected $notification;
    protected ?SubscriptionInvoice $invoice = null;

    public function __construct()
    {
        parent::__construct();

        $this->notification = new Notification();
        $this->invoice = SubscriptionInvoice::where('invoice_number', $this->notification->order_id)
            ->with(['vaPayment', 'plan', 'user'])
            ->first();
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getInvoice(): ?SubscriptionInvoice
    {
        return $this->invoice;
    }

    /** signature = sha512(order_id + status_code + gross_amount + server_key) */
    public function isSignatureKeyVerified(): bool
    {
        $local = openssl_digest(
            $this->notification->order_id
            . $this->notification->status_code
            . $this->notification->gross_amount
            . config('midtrans.server_key'),
            'sha512'
        );

        return hash_equals((string) $local, (string) $this->notification->signature_key);
    }

    public function isSuccess(): bool
    {
        $fraudOk = empty($this->notification->fraud_status) || $this->notification->fraud_status === 'accept';

        return (int) $this->notification->status_code === 200
            && $fraudOk
            && in_array($this->notification->transaction_status, ['capture', 'settlement'], true);
    }

    public function isExpire(): bool
    {
        return $this->notification->transaction_status === 'expire';
    }

    public function isCancelled(): bool
    {
        return in_array($this->notification->transaction_status, ['cancel', 'deny'], true);
    }
}
