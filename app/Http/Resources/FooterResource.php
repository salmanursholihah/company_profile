<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'company_name' => $this->company_name,
            'address'      => $this->address,
            'phone'        => $this->phone,
            'email'        => $this->email,
            'tagline'      => $this->tagline,
            'copyright'    => $this->copyright,
            'useful_links' => $this->useful_links ?? [],
            'our_services' => $this->our_services ?? [],
            'social_links' => $this->social_links ?? [],
        ];
    }
}
