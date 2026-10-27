<?php

namespace App\Services\Midtrans;

use App\Models\SubscriptionInvoice;
use App\Models\VaPayment;
use Midtrans\CoreApi;

class CreateVAService extends Midtrans
{
    public function __construct(
        protected SubscriptionInvoice $invoice,
        protected string $bank,
    ) {
        parent::__construct();
    }

    /** Buat transaksi VA di Midtrans lalu simpan ke va_payments. */
    public function getVA(): VaPayment
    {
        $response = CoreApi::charge($this->buildParams());

        return $this->store($response);
    }

    protected function buildParams(): array
    {
        $user   = $this->invoice->user;
        $amount = (int) round((float) $this->invoice->total_amount);
        $name   = 'Langganan ' . ($this->invoice->plan->name ?? '-');

        $base = [
            'transaction_details' => [
                'order_id'     => $this->invoice->invoice_number,
                'gross_amount' => $amount,
            ],
            'item_details' => [[
                'id'       => 'SUB-' . $this->invoice->plan_id,
                'price'    => $amount,
                'quantity' => 1,
                'name'     => mb_substr($name, 0, 50),
            ]],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
            ],
            'custom_expiry' => [
                'expiry_duration' => (int) config('subscription.va_expiry_hours', 24),
                'unit'            => 'hour',
            ],
        ];

        if ($this->bank === 'mandiri') {
            return $base + [
                'payment_type' => 'echannel',
                'echannel'     => [
                    'bill_info1' => 'Payment For:',
                    'bill_info2' => mb_substr($name, 0, 30),
                ],
            ];
        }

        return $base + [
            'payment_type'  => 'bank_transfer',
            'bank_transfer' => ['bank' => $this->bank],
        ];
    }

    protected function store(object $response): VaPayment
    {
        $billerCode = null;

        if ($this->bank === 'mandiri') {
            $vaNumber   = $response->bill_key ?? null;
            $billerCode = $response->biller_code ?? null;
        } elseif ($this->bank === 'permata') {
            $vaNumber = $response->permata_va_number ?? null;
        } else {
            $vaNumber = $response->va_numbers[0]->va_number ?? null;
        }

        return VaPayment::updateOrCreate(
            ['invoice_id' => $this->invoice->id],
            [
                'user_id'        => $this->invoice->user_id,
                'bank'           => $this->bank,
                'va_number'      => $vaNumber,
                'va_name'        => $this->invoice->user->name,
                'biller_code'    => $billerCode,
                'amount'         => $this->invoice->total_amount,
                'status'         => 'pending',
                'transaction_id' => $response->transaction_id ?? null,
                'expired_at'     => $this->invoice->due_at,
                'bank_response'  => json_decode(json_encode($response), true),
            ]
        );
    }
}
