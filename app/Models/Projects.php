<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongToMany;

class Projects extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'github_url',
        'live_url',
        'featured'
    ];

    public function skills(): BelongToMany
    {
        return $this->belongsToMany(Skill::class);
    }
}
