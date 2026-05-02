<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongToMany;

class Skill extends Model
{
    protected $fillable = ['name', 'category', 'proficiency'];

    public function projects(): BelongToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
