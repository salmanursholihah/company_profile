<?php

namespace Database\Seeders;

class HasilUjiLabSeeder extends OnceSeeder
{
    public function run(): void
    {
        $this->once('hasil_uji_labs', ['judul' => 'Hasil uji laboratorium air olahan'], [
            'poin1' => 'BOD turun hingga 95% dan COD memenuhi baku mutu.',
            'poin2' => 'pH stabil di rentang 6–9 pada seluruh sampel uji.',
            'gambar' => null,
        ]);
    }
}
