<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;

class BlogController extends ApiController
{
    // GET /api/v1/blogs?q=&category=&per_page=&page=
    // Hanya artikel berstatus "published" yang tampil di aplikasi.
    public function index(): JsonResponse
    {
        $blogs = Blog::query()
            ->where('status', 'published')
            ->when(request('q'), fn ($q, $s) => $q->where('title', 'like', "%{$s}%"))
            ->when(request('category'), fn ($q, $c) => $q->where('category', $c))
            ->latest()
            ->paginate($this->perPage(6));

        return $this->paginated($blogs, BlogResource::class);
    }

    // GET /api/v1/blogs/{slug}
    public function show(string $slug): JsonResponse
    {
        $blog = Blog::where('status', 'published')->where('slug', $slug)->firstOrFail();

        $related = Blog::where('status', 'published')
            ->where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return $this->ok([
            'blog'    => (new BlogResource($blog))->additional(['detail' => true])->resolve(),
            'related' => BlogResource::collection($related)->resolve(),
        ]);
    }
}
