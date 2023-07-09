<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'short_name',
        'price',
        'short_description',
        'description',
        'what_you_will_learn',
        'requirements',
        'lang'
    ];

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class, 'course_id', 'id');
    }

    public function advertisements(): HasMany
    {
        return $this->hasMany(Advertisement::class, 'course_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'course_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'course_id', 'id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_course', 'category_id', 'course_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function skillLevel(): BelongsTo
    {
        return $this->belongsTo(SkillLevel::class, 'skill_level_id', 'id');
    }
}
