<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';

    protected $fillable = [
        'name',
        'is_public',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class, 'chapter_id', 'id');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'chapter_id', 'id');
    }
}
