<?php

namespace Database\Seeders;

/** Tabel company dan contoh pesan masuk (contacts). */
class CompanySeeder extends OnceSeeder
{
    public function run(): void
    {
        $this->once('company', ['nama' => 'PT Utama Cipta Tata Asri'], [
            'alamat' => 'Jl. Ahmad Yani Perum PJKA No.4',
            'contact' => '0831-1666-8809',
        ]);

        $messages = [
            ['Rina Wulandari', 'rina@example.com', 'Konsultasi IPAL kos', 'Halo, saya ingin konsultasi IPAL untuk kos 20 kamar.'],
            ['Hendra Gunawan', 'hendra@example.com', 'Penawaran IPAL hotel', 'Mohon penawaran IPAL kapasitas 30 m³/hari untuk hotel kami.'],
        ];
        foreach ($messages as [$name, $email, $subject, $message]) {
            $this->once('contacts', ['email' => $email, 'subject' => $subject], [
                'name' => $name,
                'message' => $message,
            ]);
        }
    }
}
