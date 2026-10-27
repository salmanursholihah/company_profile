<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Guide;
use App\Models\GuideCategory;
use App\Models\GuideLesson;
use App\Services\GuideAccessService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * Auth OPSIONAL: tanpa token tetap bisa melihat katalog; akses materi
 * diputuskan GuideAccessService.
 */
class GuideController extends ApiController
{
    public function __construct(private GuideAccessService $access) {}

    // GET /guides/categories
    public function categories(): JsonResponse
    {
        $rows = GuideCategory::where('is_active', true)
            ->orderBy('sort_order')->orderBy('name')->get()
            ->map(fn ($c) => ['id' => $c->id, 'name' => $c->name, 'slug' => $c->slug]);

        return $this->ok($rows);
    }

    // GET /guides?q=&category=<slug>&page=
    public function index(Request $request): JsonResponse
    {
        $q = Guide::published()
            ->with('category')
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

        $p = $q->paginate($this->perPage(10));

        return $this->ok(
            $p->getCollection()->map(fn ($g) => $this->card($g))->values(),
            null,
            200,
            [
                'current_page' => $p->currentPage(),
                'last_page'    => $p->lastPage(),
                'per_page'     => $p->perPage(),
                'total'        => $p->total(),
                'has_more'     => $p->hasMorePages(),
            ]
        );
    }

    // GET /guides/{slug}
    public function show(Request $request, string $slug): JsonResponse
    {
        $user  = $request->user('sanctum');
        $guide = Guide::published()->with('category')->where('slug', $slug)->firstOrFail();

        $lessons = $guide->lessons()->where('is_published', true)->get();

        $guide->lessons_count      = $lessons->count();
        $guide->free_lessons_count = $lessons->where('is_free', true)->count();

        return $this->ok([
            'guide' => $this->card($guide) + [
                'description' => $guide->description,
            ],
            'lessons' => $lessons->map(fn (GuideLesson $l) => [
                'id'               => $l->id,
                'title'            => $l->title,
                'type'             => $l->type,
                'description'      => $l->description,
                'duration_minutes' => $l->duration_minutes,
                'is_free'          => $l->is_free,
                'locked'           => ! $this->access->canAccess($user, $l),
            ])->values(),
            'access' => [
                'is_authenticated' => (bool) $user,
                'has_subscription' => $user ? $user->hasActiveSubscription() : false,
            ],
        ]);
    }

    // GET /guides/{slug}/lessons/{id}
    public function lesson(Request $request, string $slug, int $id): JsonResponse
    {
        $user  = $request->user('sanctum');
        $guide = Guide::published()->where('slug', $slug)->firstOrFail();
        $lesson = $guide->lessons()->where('is_published', true)->where('id', $id)->firstOrFail();

        if ($code = $this->access->denyReason($user, $lesson)) {
            return response()->json([
                'success' => false,
                'code'    => $code,
                'message' => $this->access->message($code),
            ], 403);
        }

        $ids  = $guide->lessons()->where('is_published', true)->pluck('id')->values();
        $pos  = $ids->search($lesson->id);
        $prev = $pos > 0 ? $ids[$pos - 1] : null;
        $next = ($pos !== false && $pos < $ids->count() - 1) ? $ids[$pos + 1] : null;

        $file = null;
        if ($lesson->type === 'file' && $lesson->file_path) {
            $file = [
                'name' => $lesson->file_name ?: basename($lesson->file_path),
                'ext'  => $lesson->file_ext,
                // tautan bertanda tangan, berumur 10 menit
                'url'  => URL::temporarySignedRoute('api.guides.file', now()->addMinutes(10), ['lesson' => $lesson->id]),
            ];
        }

        return $this->ok([
            'lesson' => [
                'id'               => $lesson->id,
                'title'            => $lesson->title,
                'type'             => $lesson->type,
                'description'      => $lesson->description,
                'duration_minutes' => $lesson->duration_minutes,
                'is_free'          => $lesson->is_free,
                'video_url'        => $lesson->type === 'video' ? $lesson->video_url : null,
                'video_id'         => $lesson->type === 'video' ? $lesson->video_id : null,
                'content'          => $lesson->type === 'article' ? $lesson->content : null,
                'file'             => $file,
            ],
            'prev_id' => $prev,
            'next_id' => $next,
        ]);
    }

    // GET /guides/files/{lesson}  (signed)
    public function file(GuideLesson $lesson)
    {
        abort_unless($lesson->is_published && $lesson->file_path && Storage::disk('local')->exists($lesson->file_path), 404);

        return Storage::disk('local')->download($lesson->file_path, $lesson->file_name ?: basename($lesson->file_path));
    }

    protected function card(Guide $g): array
    {
        return [
            'id'                 => $g->id,
            'slug'               => $g->slug,
            'title'              => $g->title,
            'summary'            => $g->summary,
            'cover_url'          => $g->cover_url,
            'level'              => $g->level,
            'category'           => $g->category ? ['id' => $g->category->id, 'name' => $g->category->name, 'slug' => $g->category->slug] : null,
            'lessons_count'      => (int) ($g->lessons_count ?? 0),
            'free_lessons_count' => (int) ($g->free_lessons_count ?? 0),
        ];
    }
}
