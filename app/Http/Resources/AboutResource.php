<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AboutResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'headline'     => $this->headline,
            'sub_headline' => $this->sub_headline,
            'image_url'    => Media::url($this->image),
            'video_url'    => $this->url,
            // description berisi HTML dari editor admin; excerpt = versi teks polos
            'description'  => $this->description,
            'excerpt'      => $this->description
                ? Str::limit(trim(strip_tags($this->description)), 300)
                : null,
        ];
    }
}
