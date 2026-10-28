<?php

return [
    // Bank VA yang boleh dipilih pelanggan
    // 'qris' = QRIS (GoPay/OVO/DANA/m-banking apa pun); sisanya Virtual Account bank
    'banks' => ['bca', 'bni', 'bri', 'permata', 'mandiri', 'qris'],

    // Masa berlaku QRIS (menit). QR berumur pendek; bila lewat, pelanggan membuat tagihan baru.
    'qris_expiry_minutes' => 30,

    // Masa berlaku VA (jam) sejak dibuat
    'va_expiry_hours' => 24,

    // Prefix nomor tagihan (= order_id di Midtrans)
    'invoice_prefix' => 'GUIDE',

    // Pengingat masa langganan: dikirim saat sisa hari = salah satu angka ini.
    'reminder_days' => [7, 3, 1],
];
