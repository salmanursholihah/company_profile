<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideCategory extends Model
{
    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean'];

    public function guides()
    {
        return $this->hasMany(Guide::class, 'category_id');
    }
}
