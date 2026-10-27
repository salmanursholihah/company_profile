<?php

use App\Http\Controllers\Api\V1\AboutController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\CatalogController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\FooterController;
use App\Http\Controllers\Api\V1\GuideController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\MidtransCallbackController;
use App\Http\Controllers\Api\V1\NotificationController;
use App\Http\Controllers\Api\V1\PortfolioController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API v1 — Company Profile (dipakai aplikasi mobile Flutter)
| Prefix otomatis /api  =>  /api/v1/...
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    /* ---------- Konten publik ---------- */
    // Brand, logo, warna & teks — diatur dari Admin > Setting
    Route::get('settings', SettingController::class);
    Route::get('home', HomeController::class);
    Route::get('about', AboutController::class);
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('portfolios', [PortfolioController::class, 'index']);
    Route::get('footer', FooterController::class);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{product}', [ProductController::class, 'show']);

    // "companies" harus didaftarkan sebelum "{katalog}"
    Route::get('catalogs/companies', [CatalogController::class, 'companies']);
    Route::get('catalogs', [CatalogController::class, 'index']);
    Route::get('catalogs/{katalog}', [CatalogController::class, 'show']);

    Route::get('blogs', [BlogController::class, 'index']);
    Route::get('blogs/{slug}', [BlogController::class, 'show']);

    Route::post('contact', [ContactController::class, 'store'])->middleware('throttle:5,1');

    /* ---------- Panduan (auth opsional) ---------- */
    Route::prefix('guides')->group(function () {
        Route::get('categories', [GuideController::class, 'categories']);
        // "files/{lesson}" sebelum "{slug}"; hanya lewat tautan bertanda tangan
        Route::get('files/{lesson}', [GuideController::class, 'file'])->name('api.guides.file')->middleware('signed');
        Route::get('/', [GuideController::class, 'index']);
        Route::get('{slug}', [GuideController::class, 'show']);
        Route::get('{slug}/lessons/{id}', [GuideController::class, 'lesson']);
    });

    /* ---------- Langganan ---------- */
    Route::get('subscriptions/plans', [SubscriptionController::class, 'plans']);
    Route::middleware('auth:sanctum')->prefix('subscriptions')->group(function () {
        Route::get('status', [SubscriptionController::class, 'status']);
        Route::post('select', [SubscriptionController::class, 'select'])->middleware('throttle:10,1');
        Route::post('check-va', [SubscriptionController::class, 'checkVa'])->middleware('throttle:30,1');
        Route::get('invoices', [SubscriptionController::class, 'invoices']);
    });

    /* ---------- Notifikasi (kotak masuk + token perangkat FCM) ---------- */
    Route::middleware('auth:sanctum')->prefix('notifications')->group(function () {
        Route::post('device-token', [NotificationController::class, 'registerToken'])->middleware('throttle:20,1');
        Route::delete('device-token', [NotificationController::class, 'removeToken']);
        Route::get('unread-count', [NotificationController::class, 'unreadCount']);
        Route::post('read-all', [NotificationController::class, 'markAllRead']);
        Route::get('/', [NotificationController::class, 'index']);
        Route::post('{id}/read', [NotificationController::class, 'markRead'])->whereNumber('id');
    });

    // Webhook Midtrans (verifikasi signature di controller)
    Route::post('midtrans/callback', [MidtransCallbackController::class, 'handle']);

    /* ---------- Auth (Sanctum token) ---------- */
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->middleware('throttle:10,1');
        Route::post('login', [AuthController::class, 'login'])->middleware('throttle:10,1');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::get('me', [AuthController::class, 'me']);
            Route::put('profile', [AuthController::class, 'updateProfile']);
        });
    });
});
