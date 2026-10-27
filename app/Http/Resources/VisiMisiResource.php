<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisiMisiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->id,
            'type' => $this->type, // visi | misi
            'icon' => $this->icon,
            'text' => $this->text,
        ];
    }
}
