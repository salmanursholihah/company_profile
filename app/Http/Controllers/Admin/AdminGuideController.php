<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\GuideCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminGuideController extends Controller
{
    public function index()
    {
        $guides = Guide::with('category')
            ->withCount(['lessons', 'lessons as free_lessons_count' => fn ($q) => $q->where('is_free', true)])
            ->orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.guides.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.guides.form', [
            'guide'      => new Guide(['is_published' => true, 'level' => 'pemula']),
            'categories' => GuideCategory::orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);

        if ($request->hasFile('cover')) {
            $data['cover_path'] = $request->file('cover')->store('guides/covers', 'public');
        }

        $guide = Guide::create($data);

        return redirect()->route('admin.guides.lessons.index', $guide)
            ->with('success', 'Panduan dibuat. Sekarang tambahkan materinya.');
    }

    public function edit(Guide $guide)
    {
        return view('admin.guides.form', [
            'guide'      => $guide,
            'categories' => GuideCategory::orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Guide $guide)
    {
        $data = $this->validated($request);

        if ($request->hasFile('cover')) {
            if ($guide->cover_path) {
                Storage::disk('public')->delete($guide->cover_path);
            }
            $data['cover_path'] = $request->file('cover')->store('guides/covers', 'public');
        } elseif ($request->boolean('remove_cover') && $guide->cover_path) {
            Storage::disk('public')->delete($guide->cover_path);
            $data['cover_path'] = null;
        }

        $guide->update($data);

        return redirect()->route('admin.guides.index')->with('success', 'Panduan diperbarui.');
    }

    public function destroy(Guide $guide)
    {
        foreach ($guide->lessons as $l) {
            if ($l->file_path) {
                Storage::disk('local')->delete($l->file_path);
            }
        }
        if ($guide->cover_path) {
            Storage::disk('public')->delete($guide->cover_path);
        }
        $guide->delete();

        return redirect()->route('admin.guides.index')->with('success', 'Panduan dihapus.');
    }

    protected function validated(Request $r): array
    {
        $d = $r->validate([
            'title'       => 'required|string|max:200',
            'category_id' => 'nullable|exists:guide_categories,id',
            'summary'     => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'level'       => 'required|in:pemula,menengah,lanjut',
            'sort_order'  => 'nullable|integer|min:0',
            'cover'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'cover.uploaded' => 'Cover gagal diunggah. Ukuran file melebihi batas server (bawaan PHP 2 MB). Kecilkan gambar atau naikkan upload_max_filesize di php.ini.',
            'cover.image'    => 'Cover harus berupa gambar.',
            'cover.mimes'    => 'Format cover harus JPG, PNG, atau WEBP.',
            'cover.max'      => 'Ukuran cover maksimal 2 MB.',
        ]);
        unset($d['cover'], $d['remove_cover']);
        $d['sort_order']   = $d['sort_order'] ?? 0;
        $d['is_published'] = $r->boolean('is_published');

        return $d;
    }

    protected function uniqueSlug(string $title): string
    {
        $base = Str::slug($title) ?: 'panduan';
        $slug = $base;
        $i = 2;
        while (Guide::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
