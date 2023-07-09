<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'name',
        'text',
        'count_likes',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function parentComments(): HasMany
    {
        return $this->hasMany(ClosureComment::class, 'parent_id', 'id');
    }

    public function childComments(): HasMany
    {
        return $this->hasMany(ClosureComment::class, 'child_id', 'id');
    }
}
