<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/** Tabel vendors dan product_vendors (produk milik vendor). */
class VendorSeeder extends OnceSeeder
{
    public function run(): void
    {
        $vendors = [
            ['CV Tirta Mandiri', 'tirta@vendor.test', '081200000001', 'Jl. Kaliurang Km 8, Sleman', 'aktif'],
            ['UD Fiber Jaya', 'fiberjaya@vendor.test', '081200000002', 'Jl. Magelang Km 5, Yogyakarta', 'aktif'],
            ['PT Aero Teknik', 'aero@vendor.test', '081200000003', 'Jl. Solo Km 10, Sleman', 'pending'],
        ];
        foreach ($vendors as [$name, $email, $kontak, $alamat, $status]) {
            $this->once('vendors', ['email' => $email], [
                'name' => $name,
                'kontak' => $kontak,
                'alamat' => $alamat,
                'jumlah_product' => '0',
                'status' => $status,
            ]);
        }

        // [vendor email, name, category, description, price, stock]
        $products = [
            ['tirta@vendor.test', 'Pompa Sirkulasi 1 HP', 'Pompa', 'Pompa sirkulasi untuk bak aerasi.', 2150000, 10],
            ['tirta@vendor.test', 'Diffuser Gelembung Halus', 'Aerasi', 'Diffuser disk untuk blower IPAL.', 185000, 40],
            ['fiberjaya@vendor.test', 'Tangki Fiber 2000 Liter', 'Tangki', 'Tangki fiberglass untuk bak penampung.', 3600000, 6],
        ];
        foreach ($products as [$email, $name, $category, $description, $price, $stock]) {
            $vendorId = DB::table('vendors')->where('email', $email)->value('id');
            if (! $vendorId) {
                continue;
            }
            $this->once('product_vendors', ['slug' => Str::slug($name)], [
                'vendor_id' => $vendorId,
                'name' => $name,
                'category' => $category,
                'description' => $description,
                'price' => $price,
                'stock' => $stock,
                'image' => null,
            ]);
        }

        // Samakan jumlah_product dengan data yang ada
        foreach (DB::table('vendors')->pluck('id') as $id) {
            DB::table('vendors')->where('id', $id)->update([
                'jumlah_product' => (string) DB::table('product_vendors')->where('vendor_id', $id)->count(),
            ]);
        }
    }
}
