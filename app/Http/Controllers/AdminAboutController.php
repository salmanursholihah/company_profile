<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Legalitas;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

/**
 * Admin > About: konten "Tentang", Legalitas, dan Visi/Misi dalam satu halaman.
 *
 * Catatan perbaikan:
 *  - Route::resource('about', ...) butuh method create/store/show/edit/update/destroy.
 *    Sebelumnya hanya ada createAbout/storeAbout/editAbout/updateAbout sehingga tombol
 *    Tambah/Edit/Simpan melempar BadMethodCallException ("Method ... does not exist").
 *  - $request->all() ikut membawa _token & _method; dengan $guarded = [] itu menjadi
 *    "Unknown column '_token'" saat create()/update(). Sekarang hanya field yang dipakai.
 */
class AdminAboutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $abouts    = About::latest()->get();
        $legalitas = Legalitas::orderBy('urutan')->get();
        $visiMisi  = VisiMisi::all();

        return view('admin.about.index', compact('abouts', 'legalitas', 'visiMisi'));
    }

    /*
    |--------------------------------------------------------------------------
    | ABOUT  (route resource: admin.about.*)
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        return $this->storeAbout($request);
    }

    public function show($id)
    {
        return redirect()->route('admin.about.edit', $id);
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        return $this->updateAbout($request, $id);
    }

    public function destroy($id)
    {
        About::findOrFail($id)->delete();

        return redirect()->route('admin.about.index')->with('success', 'Konten About dihapus.');
    }

    /** Dipanggil form di halaman index (route: admin.about.storeAbout) dan store(). */
    public function storeAbout(Request $request)
    {
        $data = $request->validate([
            'headline'     => 'required|string|max:255',
            'sub_headline' => 'nullable|string|max:255',
            'description'  => 'required|string',
            'url'          => 'nullable|string|max:255',
            'image'        => 'required|image|max:5120',
        ]);

        $imagePath = $request->file('image')->store('uploads/about', 'public');

        About::create([
            'headline'     => $data['headline'],
            'sub_headline' => $data['sub_headline'] ?? null,
            'description'  => $data['description'],
            'url'          => $data['url'] ?? null,
            'image'        => 'storage/' . $imagePath,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Konten About dibuat.');
    }

    public function updateAbout(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $data = $request->validate([
            'headline'     => 'required|string|max:255',
            'sub_headline' => 'nullable|string|max:255',
            'description'  => 'required|string',
            'url'          => 'nullable|string|max:255',
            'image'        => 'nullable|image|max:5120',
        ]);

        $payload = [
            'headline'     => $data['headline'],
            'sub_headline' => $data['sub_headline'] ?? null,
            'description'  => $data['description'],
            'url'          => $data['url'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $payload['image'] = 'storage/' . $request->file('image')->store('uploads/about', 'public');
        }

        $about->update($payload);

        return redirect()->route('admin.about.index')->with('success', 'Konten About diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | LEGALITAS
    |--------------------------------------------------------------------------
    */
    public function storeLegalitas(Request $request)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urutan'    => 'nullable|integer',
            'image'     => 'nullable|image',
        ]);

        $payload = [
            'judul'     => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'urutan'    => (int) ($data['urutan'] ?? 0),
        ];

        if ($request->hasFile('image')) {
            $payload['image'] = $this->moveLegalitasImage($request);
        }

        Legalitas::create($payload);

        return redirect()->route('admin.about.index')->with('success', 'Legalitas ditambahkan.');
    }

    /** Edit legalitas dikerjakan CRUD resource AdminLegalitasController. */
    public function editLegalitas($id)
    {
        return redirect()->route('admin.legalitas.edit', $id);
    }

    public function updateLegalitas(Request $request, $id)
    {
        $legalitas = Legalitas::findOrFail($id);

        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan'    => 'nullable|integer',
            'image'     => 'nullable|image',
        ]);

        $payload = [
            'judul'     => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'urutan'    => (int) ($data['urutan'] ?? 0),
        ];

        if ($request->hasFile('image')) {
            $payload['image'] = $this->moveLegalitasImage($request);
        }

        $legalitas->update($payload);

        return redirect()->route('admin.about.index')->with('success', 'Legalitas diperbarui.');
    }

    /** Legalitas menyimpan NAMA FILE saja, di public/uploads/legalitas (lihat App\Support\Media). */
    private function moveLegalitasImage(Request $request): string
    {
        $file     = $request->file('image');
        $filename = time() . '-' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());
        $file->move(public_path('uploads/legalitas'), $filename);

        return $filename;
    }

    /*
    |--------------------------------------------------------------------------
    | VISI MISI
    |--------------------------------------------------------------------------
    */
    public function storeVisiMisi(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|string',
            'type' => 'required|in:visi,misi',
            'icon' => 'nullable|string|max:255',
        ]);

        VisiMisi::create([
            'text' => $data['text'],
            'type' => $data['type'],
            'icon' => $data['icon'] ?? null,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Visi/Misi ditambahkan.');
    }

    /**
     * Sebelumnya me-render view 'admin.visimisi.edit' yang tidak ada (foldernya visi_misi)
     * -> "View [admin.visimisi.edit] not found". Edit dikerjakan AdminVisiMisiController.
     */
    public function editVisiMisi($id)
    {
        return redirect()->route('admin.visi_misi.edit', $id);
    }

    public function updateVisiMisi(Request $request, $id)
    {
        $visiMisi = VisiMisi::findOrFail($id);

        $data = $request->validate([
            'text' => 'required|string',
            'type' => 'required|in:visi,misi',
            'icon' => 'nullable|string|max:255',
        ]);

        $visiMisi->update([
            'text' => $data['text'],
            'type' => $data['type'],
            'icon' => $data['icon'] ?? null,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Visi/Misi diperbarui.');
    }
}
