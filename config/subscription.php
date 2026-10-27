<?php

return [
    // Bank VA yang boleh dipilih pelanggan
    'banks' => ['bca', 'bni', 'bri', 'permata', 'mandiri'],

    // Masa berlaku VA (jam) sejak dibuat
    'va_expiry_hours' => 24,

    // Prefix nomor tagihan (= order_id di Midtrans)
    'invoice_prefix' => 'GUIDE',

    // Pengingat masa langganan: dikirim saat sisa hari = salah satu angka ini.
    'reminder_days' => [7, 3, 1],
];
