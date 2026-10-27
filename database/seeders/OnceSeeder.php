<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Dasar untuk seeder data contoh: sebuah baris hanya ditambahkan bila belum ada
 * baris dengan nilai kunci ($match) yang sama, jadi aman dijalankan berulang.
 * Memakai DB::table sehingga tidak bergantung pada nama model.
 */
abstract class OnceSeeder extends Seeder
{
    protected function once(string $table, array $match, array $values = []): void
    {
        if (DB::table($table)->where($match)->exists()) {
            return;
        }
        $now = now();
        DB::table($table)->insert(array_merge($match, $values, [
            'created_at' => $now,
            'updated_at' => $now,
        ]));
    }
}
