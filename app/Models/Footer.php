<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'phone',
        'email',
        'useful_links',
        'our_services',
        'social_links',
        'tagline',
        'copyright'
    ];

    protected $casts = [
        'useful_links' => 'array',
        'our_services' => 'array',
        'social_links' => 'array',
    ];
}
