<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HalamanUtama;
use App\Models\VisiMisi;
use App\Models\Service;
use App\Models\Team;
use App\Models\Katalog;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
  $about = About::first();
  $halaman_utama = HalamanUtama::all();

    $aboutPreview = $about
        ? Str::limit(strip_tags($about->description), 993, '...')
        : null;
        // Karena Anda pakai $visi dan $misi di blade
        $visi = VisiMisi::where('type', 'visi')->first();
        $misi = VisiMisi::where('type', 'misi')->get();

        $layanan = Service::all();
        $services = Service::all();
        $katalogs = Katalog::all();
        $teams = Team::all();

        return view('index', compact(
            'about',
            'aboutPreview',
            'visi',
            'misi',
            'layanan',
            'services',
            'katalogs',
            'teams',
            'halaman_utama'
        ));
    }
}
