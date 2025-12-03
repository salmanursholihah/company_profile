<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
{
    $abouts = About::all(); // ambil semua data

    $visi = VisiMisi::where('type', 'visi')->first();
    $misi = VisiMisi::where('type', 'misi')->get();

    return view('about', compact('abouts', 'visi', 'misi'));
}

}
