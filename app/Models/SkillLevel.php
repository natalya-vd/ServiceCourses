<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkillLevel extends Model
{
    use HasFactory;

    protected $table = 'skills_levels';

    protected $fillable = [
        'name',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'skill_level_id', 'id');
    }
}
