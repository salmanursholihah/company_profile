<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $guarded = [];
    protected $casts = ['is_published' => 'boolean'];

    public function category()
    {
        return $this->belongsTo(GuideCategory::class, 'category_id');
    }

    public function lessons()
    {
        return $this->hasMany(GuideLesson::class)->orderBy('sort_order')->orderBy('id');
    }

    public function scopePublished($q)
    {
        return $q->where('is_published', true);
    }

    public function getCoverUrlAttribute(): ?string
    {
        // asset() mengikuti host/port yang sedang dipakai (admin, emulator, HP),
        // tidak bergantung pada APP_URL seperti Storage::url().
        return $this->cover_path ? asset('storage/' . ltrim($this->cover_path, '/')) : null;
    }
}
