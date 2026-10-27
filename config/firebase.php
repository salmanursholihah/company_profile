<?php

return [
    // Path file service account (Firebase Console > Project settings > Service accounts
    // > Generate new private key). JANGAN di-commit ke git.
    'credentials' => env('FIREBASE_CREDENTIALS', storage_path('app/firebase/service-account.json')),

    // Harus sama dengan channel yang dibuat di aplikasi Flutter.
    'android_channel' => env('FIREBASE_ANDROID_CHANNEL', 'compro_default'),

    // Timeout panggilan ke FCM (detik) supaya webhook Midtrans tidak tertahan.
    'timeout' => 8,
];
