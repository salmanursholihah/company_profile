<?php

namespace Database\Seeders;

/** Tabel products (produk toko). Gambar wajib terisi di migrasi, jadi diisi kosong. */
class ProductSeeder extends OnceSeeder
{
    public function run(): void
    {
        // [name, kategori, deskripsi, price, discount, stok, lokasi]
        $items = [
            ['Blower Udara 250 Watt', 'Aksesori', 'Blower hemat daya untuk aerasi IPAL skala kecil.', '1850000', '10', '12', 'Yogyakarta'],
            ['Media Biofilter Sarang Tawon', 'Media', 'Media biofilter PVC per meter kubik.', '2400000', null, '30', 'Yogyakarta'],
            ['Pompa Celup 0,5 HP', 'Pompa', 'Pompa celup untuk transfer air limbah.', '1250000', '5', '8', 'Sleman'],
            ['Tutup Manhole Fiber', 'Aksesori', 'Tutup manhole ringan dan tahan korosi.', '450000', null, '25', 'Yogyakarta'],
        ];
        foreach ($items as [$name, $kategori, $deskripsi, $price, $discount, $stok, $lokasi]) {
            $this->once('products', ['name' => $name], [
                'image' => '',
                'kategori' => $kategori,
                'deskripsi' => $deskripsi,
                'price' => $price,
                'discount' => $discount,
                'stok' => $stok,
                'lokasi' => $lokasi,
                'status' => 'tersedia',
            ]);
        }
    }
}
