<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // konten penuh hanya jika dipanggil dengan ->additional(['detail' => true])
        $detail = (bool) ($this->additional['detail'] ?? false);

        // Model Blog tidak punya cast tanggal, jadi published_at berupa string
        $date = $this->published_at ?? $this->created_at;

        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'slug'         => $this->slug,
            'category'     => $this->category,
            'author'       => $this->author,
            'image_url'    => Media::url($this->image),
            'excerpt'      => Str::limit(trim(strip_tags((string) $this->content)), 160),
            'published_at' => $date ? Carbon::parse($date)->toDateString() : null,
            // konten lengkap (HTML) hanya dikirim di endpoint detail
            $this->mergeWhen($detail, [
                'content' => $this->content,
            ]),
        ];
    }
}
