<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\VisiMisi;
use App\Models\Legalitas;
use App\Models\HasilUjiLab;

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


        return view('about', compact(
            'abouts',
            'visi',
            'misi',
            'legalitas',
            'hasilUji'
        ));
    }
}