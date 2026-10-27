<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideLesson extends Model
{
    protected $guarded = [];
    protected $casts = ['is_free' => 'boolean', 'is_published' => 'boolean'];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    /** ID video dari link YouTube (watch, youtu.be, embed, shorts). */
    public function getVideoIdAttribute(): ?string
    {
        if (! $this->video_url) {
            return null;
        }
        if (preg_match('~(?:youtu\.be/|v=|embed/|shorts/|live/)([A-Za-z0-9_-]{11})~', $this->video_url, $m)) {
            return $m[1];
        }
        return null;
    }

    public function getFileExtAttribute(): ?string
    {
        $name = $this->file_name ?: $this->file_path;
        return $name ? strtolower(pathinfo($name, PATHINFO_EXTENSION)) : null;
    }
}
