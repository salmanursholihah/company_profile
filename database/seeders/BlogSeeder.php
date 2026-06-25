<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title'    => 'Pentingnya Pengelolaan Limbah Cair bagi Industri Modern',
                'category' => 'Lingkungan',
                'author'   => 'Andi Pratama',
                'image'    => 'blogs/limbah-cair-industri.jpg',
                'content'  => 'Limbah cair yang tidak diolah dengan benar dapat mencemari sumber air dan merusak ekosistem sekitar. Banyak industri kini mulai beralih ke sistem pengolahan air limbah (IPAL) yang ramah lingkungan untuk memenuhi standar baku mutu pemerintah sekaligus menjaga keberlanjutan usaha mereka.',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title'    => 'Teknologi IPAL Terbaru untuk Efisiensi Pengolahan Air Limbah',
                'category' => 'Teknologi',
                'author'   => 'Siti Nurhaliza',
                'image'    => 'blogs/teknologi-ipal-terbaru.jpg',
                'content'  => 'Inovasi teknologi membran dan sistem biologis aerobik kini banyak digunakan untuk mempercepat proses penjernihan air limbah. Teknologi ini terbukti mampu menurunkan kadar BOD dan COD secara signifikan dalam waktu yang lebih singkat dibanding metode konvensional.',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title'    => 'Kebijakan Pemerintah Soal Baku Mutu Air Limbah Diperketat',
                'category' => 'Kebijakan',
                'author'   => 'Budi Santoso',
                'image'    => 'blogs/kebijakan-baku-mutu.jpg',
                'content'  => 'Kementerian Lingkungan Hidup resmi mengeluarkan regulasi baru terkait ambang batas baku mutu air limbah bagi sektor industri. Perusahaan yang tidak memenuhi standar ini akan dikenai sanksi administratif hingga pencabutan izin operasional.',
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'title'    => 'Dampak Limbah Cair Tak Terolah terhadap Kesehatan Masyarakat',
                'category' => 'Kesehatan',
                'author'   => 'Dewi Lestari',
                'image'    => 'blogs/dampak-kesehatan-limbah.jpg',
                'content'  => 'Air yang tercemar limbah cair dapat menjadi sumber penyakit seperti diare, infeksi kulit, hingga gangguan organ dalam jangka panjang. Edukasi masyarakat tentang bahaya ini menjadi langkah penting untuk mencegah penyebaran penyakit berbasis air.',
                'published_at' => Carbon::now()->subDays(11),
            ],
            [
                'title'    => 'Studi Kasus: Sukses Mengolah Limbah Cair Pabrik Tekstil',
                'category' => 'Industri',
                'author'   => 'Rian Hidayat',
                'image'    => 'blogs/studi-kasus-tekstil.jpg',
                'content'  => 'Sebuah pabrik tekstil di Jawa Tengah berhasil menurunkan tingkat pencemaran air limbahnya hingga 90 persen setelah menerapkan sistem pengolahan terpadu. Langkah ini tidak hanya menyelamatkan lingkungan tetapi juga menghemat biaya operasional jangka panjang.',
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title'    => 'Mengenal Proses Sedimentasi dalam Pengolahan Air Limbah',
                'category' => 'Edukasi',
                'author'   => 'Nadia Putri',
                'image'    => 'blogs/proses-sedimentasi.jpg',
                'content'  => 'Sedimentasi merupakan salah satu tahap penting dalam pengolahan air limbah, di mana partikel padat dipisahkan dari air melalui proses pengendapan. Proses ini biasanya dilakukan sebelum air masuk ke tahap filtrasi dan disinfeksi.',
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title'    => 'Limbah Cair Rumah Tangga: Sering Diabaikan, Berdampak Besar',
                'category' => 'Lingkungan',
                'author'   => 'Andi Pratama',
                'image'    => 'blogs/limbah-rumah-tangga.jpg',
                'content'  => 'Selain limbah industri, limbah cair rumah tangga seperti sisa deterjen dan minyak goreng juga menyumbang pencemaran sungai yang cukup besar. Pengelolaan sederhana seperti septic tank biofilter dapat membantu mengurangi dampak ini.',
                'published_at' => Carbon::now()->subDays(25),
            ],
            [
                'title'    => 'Tren Investasi Hijau di Sektor Pengolahan Limbah Cair',
                'category' => 'Bisnis',
                'author'   => 'Fajar Ramadhan',
                'image'    => 'blogs/investasi-hijau.jpg',
                'content'  => 'Minat investor terhadap perusahaan penyedia jasa pengolahan limbah cair terus meningkat seiring tuntutan regulasi lingkungan yang lebih ketat. Sektor ini dinilai memiliki prospek jangka panjang yang menjanjikan di tengah isu keberlanjutan global.',
                'published_at' => Carbon::now()->subDays(30),
            ],
            [
                'title'    => 'Cara Kerja Sistem Biofilter dalam Mengolah Air Limbah Domestik',
                'category' => 'Edukasi',
                'author'   => 'Nadia Putri',
                'image'    => 'blogs/sistem-biofilter.jpg',
                'content'  => 'Sistem biofilter menggunakan media khusus tempat bakteri pengurai berkembang biak untuk memecah zat organik dalam air limbah. Metode ini banyak diterapkan pada skala rumah tangga maupun komunitas karena biaya perawatannya relatif terjangkau.',
                'published_at' => Carbon::now()->subDays(35),
            ],
            [
                'title'    => 'Pemerintah Daerah Gandeng Swasta Bangun IPAL Komunal',
                'category' => 'Kebijakan',
                'author'   => 'Budi Santoso',
                'image'    => 'blogs/ipal-komunal.jpg',
                'content'  => 'Sejumlah pemerintah daerah mulai menjalin kerja sama dengan pihak swasta untuk membangun instalasi pengolahan air limbah komunal di kawasan padat penduduk. Program ini diharapkan dapat menekan pencemaran sungai akibat limbah domestik yang tidak terkelola.',
                'published_at' => Carbon::now()->subDays(40),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title'        => $blog['title'],
                'slug'         => Str::slug($blog['title']),
                'category'     => $blog['category'],
                'author'       => $blog['author'],
                'image'        => $blog['image'],
                'content'      => $blog['content'],
                'published_at' => $blog['published_at'],
            ]);
        }
    }
}
