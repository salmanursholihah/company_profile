<?php

// namespace App\Http\Controllers;

// use App\Models\About;
// use App\Models\legalitas;
// use App\Models\visimisi;
// use Illuminate\Http\Request;


// class AdminAboutController extends Controller
// {
//     public function index()
//     {
//         $abouts = About::latest()->get();
//         $legalitas = legalitas::all();
//         $visiMisi = visimisi::all();

//         return view('admin.about.index', compact('abouts', 'legalitas', 'visiMisi'));
//     }


//     public function create()
//     {
//         return view('admin.about.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'headline' => 'required',
//             'description' => 'required',
//             'image' => 'required|image|mimes:jpg,jpeg,png,webp',
//         ]);

//         $imagePath = $request->file('image')->store('uploads/about', 'public');

//         About::create([
//             'headline' => $request->headline,
//             'sub_headline' => $request->sub_headline,
//             'description' => $request->description,
//             'url' => $request->url,
//             'image' => 'storage/' . $imagePath
//         ]);

//         return redirect()->route('admin.about.index')->with('success', 'Konten berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $about = About::findOrFail($id);
//         return view('admin.about.edit', compact('about'));
//     }

//     public function update(Request $request, $id)
//     {
//         $about = About::findOrFail($id);

//         $request->validate([
//             'headline' => 'required',
//             'description' => 'required',
//             'image' => 'image|mimes:jpg,jpeg,png,webp',
//         ]);

//         $data = [
//             'headline' => $request->headline,
//             'sub_headline' => $request->sub_headline,
//             'description' => $request->description,
//             'url' => $request->url,
//         ];

//         if ($request->hasFile('image')) {
//             $imagePath = $request->file('image')->store('uploads/about', 'public');
//             $data['image'] = 'storage/' . $imagePath;
//         }

//         $about->update($data);

//         return redirect()->route('admin.about.index')->with('success', 'Konten berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $about = About::findOrFail($id);
//         $about->delete();

//         return redirect()->route('admin.about.index')->with('success', 'Konten berhasil dihapus.');
//     }
// }




namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Legalitas;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $abouts = About::latest()->get();
        $legalitas = Legalitas::orderBy('urutan')->get();
        $visiMisi = VisiMisi::all();

        return view('admin.about.index', compact(
            'abouts',
            'legalitas',
            'visiMisi'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | ABOUT CRUD
    |--------------------------------------------------------------------------
    */

    public function createAbout()
    {
        return view('admin.about.create');
    }

    public function storeAbout(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('uploads/about', 'public');

        About::create([
            'headline' => $request->headline,
            'sub_headline' => $request->sub_headline,
            'description' => $request->description,
            'url' => $request->url,
            'image' => 'storage/' . $imagePath
        ]);

        return redirect()->route('admin.about.index');
    }

    public function editAbout($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function updateAbout(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/about', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $about->update($data);

        return redirect()->route('admin.about.index');
    }

    /*
    |--------------------------------------------------------------------------
    | LEGALITAS CRUD
    |--------------------------------------------------------------------------
    */

    public function createLegalitas()
    {
        return view('admin.legalitas.create');
    }

    public function storeLegalitas(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/legalitas'), $filename);
            $data['image'] = $filename;
        }

        Legalitas::create($data);

        return redirect()->route('admin.about.index');
    }

    public function editLegalitas($id)
    {
        $legalitas = Legalitas::findOrFail($id);
        return view('admin.legalitas.edit', compact('legalitas'));
    }

    public function updateLegalitas(Request $request, $id)
    {
        $legalitas = Legalitas::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/legalitas'), $filename);
            $data['image'] = $filename;
        }

        $legalitas->update($data);

        return redirect()->route('admin.about.index');
    }

    /*
    |--------------------------------------------------------------------------
    | VISI MISI CRUD
    |--------------------------------------------------------------------------
    */

    public function createVisiMisi()
    {
        return view('admin.visimisi.create');
    }

    public function storeVisiMisi(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'type' => 'required|in:visi,misi'
        ]);

        VisiMisi::create($request->all());

        return redirect()->route('admin.about.index');
    }

    public function editVisiMisi($id)
    {
        $visiMisi = VisiMisi::findOrFail($id);
        return view('admin.visimisi.edit', compact('visiMisi'));
    }

    public function updateVisiMisi(Request $request, $id)
    {
        $visiMisi = VisiMisi::findOrFail($id);

        $visiMisi->update($request->all());

        return redirect()->route('admin.about.index');
    }
}
