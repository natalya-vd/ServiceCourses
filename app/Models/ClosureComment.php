<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClosureComment extends Model
{
    use HasFactory;

    protected $table = 'closure_comments';

    protected $fillable = [
        'depth',
    ];

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function childComment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'child_id', 'id');
    }
}
