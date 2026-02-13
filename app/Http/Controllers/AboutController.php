<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\VisiMisi;
use App\Models\Legalitas;
use App\Models\HasilUjiLab;
use Illuminate\Support\Facades\App;
use App\Models\Image;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        $visi = VisiMisi::where('type', 'visi')->first();
        $misi = VisiMisi::where('type', 'misi')->get();

        $legalitas = Legalitas::first();
        $hasilUji = HasilUjiLab::first();
        $clientLogos = Image::where('type', 'client_logo')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $aboutImages = Image::where('type', 'about_image')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();


        return view('about', compact(
            'abouts',
            'visi',
            'misi',
            'legalitas',
            'hasilUji',
            'clientLogos'
        ));
    }
}
