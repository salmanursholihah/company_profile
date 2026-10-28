<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\GuideCategory;
use App\Models\GuideLesson;
use App\Services\GuideAccessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/** Halaman panduan publik (web). Aturan akses memakai GuideAccessService yang sama dengan API. */
class GuideWebController extends Controller
{
    public function __construct(private GuideAccessService $access) {}

    public function index(Request $request)
    {
        $q = Guide::published()->with('category')
            ->withCount([
                'lessons as lessons_count' => fn ($l) => $l->where('is_published', true),
                'lessons as free_lessons_count' => fn ($l) => $l->where('is_published', true)->where('is_free', true),
            ])
            ->orderBy('sort_order')->orderByDesc('id');

        if ($s = trim((string) $request->query('q', ''))) {
            $q->where(fn ($w) => $w->where('title', 'like', "%{$s}%")->orWhere('summary', 'like', "%{$s}%"));
        }
        if ($slug = $request->query('category')) {
            $q->whereHas('category', fn ($c) => $c->where('slug', $slug));
        }

        return view('panduan.index', [
            'guides'     => $q->paginate(9)->withQueryString(),
            'categories' => GuideCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get(),
            'activeCat'  => $request->query('category'),
            'search'     => $s ?? '',
        ]);
    }

    public function show(Request $request, string $slug)
    {
        $guide   = Guide::published()->with('category')->where('slug', $slug)->firstOrFail();
        $lessons = $guide->lessons()->where('is_published', true)->get();
        $user    = $request->user();

        return view('panduan.show', [
            'guide'   => $guide,
            'lessons' => $lessons,
            'locked'  => $lessons->mapWithKeys(fn ($l) => [$l->id => ! $this->access->canAccess($user, $l)]),
        ]);
    }

    public function lesson(Request $request, string $slug, int $id)
    {
        $guide  = Guide::published()->where('slug', $slug)->firstOrFail();
        $lesson = $guide->lessons()->where('is_published', true)->where('id', $id)->firstOrFail();
        $code   = $this->access->denyReason($request->user(), $lesson);

        // Tamu yang masuk/daftar dari sini kembali ke materi ini; lalu otomatis diarahkan memilih paket bila perlu
        if ($code === GuideAccessService::LOGIN_REQUIRED) {
            $request->session()->put('url.intended', $request->fullUrl());
        }

        $ids  = $guide->lessons()->where('is_published', true)->pluck('id')->values();
        $pos  = $ids->search($lesson->id);

        return view('panduan.lesson', [
            'guide'   => $guide,
            'lesson'  => $lesson,
            'denied'  => $code ? $this->access->message($code) : null,
            'code'    => $code,
            'prevId'  => $pos > 0 ? $ids[$pos - 1] : null,
            'nextId'  => ($pos !== false && $pos < $ids->count() - 1) ? $ids[$pos + 1] : null,
        ]);
    }

    public function download(Request $request, string $slug, int $id)
    {
        $guide  = Guide::published()->where('slug', $slug)->firstOrFail();
        $lesson = $guide->lessons()->where('is_published', true)->where('id', $id)->firstOrFail();

        abort_if($this->access->denyReason($request->user(), $lesson), 403);
        abort_unless($lesson->type === 'file' && $lesson->file_path && Storage::disk('local')->exists($lesson->file_path), 404);

        return Storage::disk('local')->download($lesson->file_path, $lesson->file_name ?: basename($lesson->file_path));
    }
}
