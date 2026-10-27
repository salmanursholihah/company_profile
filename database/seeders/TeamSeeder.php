<?php

namespace Database\Seeders;

class TeamSeeder extends OnceSeeder
{
    public function run(): void
    {
        $items = [
            ['Andi Pratama', 'Direktur Utama'],
            ['Siti Nurhaliza', 'Kepala Teknik'],
            ['Budi Santoso', 'Manajer Proyek'],
            ['Dewi Lestari', 'Analis Laboratorium'],
        ];
        foreach ($items as [$name, $jabatan]) {
            $this->once('teams', ['name' => $name], ['jabatan' => $jabatan, 'image' => null]);
        }
    }
}
