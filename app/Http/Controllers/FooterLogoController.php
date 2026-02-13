<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterLogo;
use App\Models\Image;

class FooterLogoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'image_path' => $path,
            'type' => 'footer_logo'
        ]);

        return back()->with('success', 'Berhasil upload');
    }
}
