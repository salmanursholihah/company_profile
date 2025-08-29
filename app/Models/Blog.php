<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    'id',
    'title',
    'slug',
    'category',
    'author',
    'image',
    'content',
    'published_at',
    ];
}