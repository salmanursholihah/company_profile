<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuideCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminGuideCategoryController extends Controller
{
    public function index()
    {
        $categories = GuideCategory::withCount('guides')->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.guide-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.guide-categories.form', ['category' => new GuideCategory(['is_active' => true])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['name']);
        GuideCategory::create($data);

        return redirect()->route('admin.guide-categories.index')->with('success', 'Kategori ditambahkan.');
    }

    public function edit(GuideCategory $category)
    {
        return view('admin.guide-categories.form', compact('category'));
    }

    public function update(Request $request, GuideCategory $category)
    {
        $category->update($this->validated($request));

        return redirect()->route('admin.guide-categories.index')->with('success', 'Kategori diperbarui.');
    }

    public function destroy(GuideCategory $category)
    {
        $category->delete(); // panduan terkait jadi tanpa kategori (nullOnDelete)

        return redirect()->route('admin.guide-categories.index')->with('success', 'Kategori dihapus.');
    }

    protected function validated(Request $r): array
    {
        $d = $r->validate([
            'name'       => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $d['sort_order'] = $d['sort_order'] ?? 0;
        $d['is_active']  = $r->boolean('is_active');

        return $d;
    }

    protected function uniqueSlug(string $name): string
    {
        $base = Str::slug($name) ?: 'kategori';
        $slug = $base;
        $i = 2;
        while (GuideCategory::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
