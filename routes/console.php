<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Pengingat langganan, tiap pagi WIB. Server butuh cron: * * * * * php artisan schedule:run
Schedule::command('subscriptions:notify-expiring')->dailyAt('09:00')->timezone('Asia/Jakarta');
