<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use  HasFactory, SoftDeletes, Sluggable, HasApiTokens;

    protected $fillable = [
        "title",
        "description",
        "user_id",
        'body',
        "post_image"
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable(): array
    {
        return [
            "slug" => [
                "source" => ["title"]
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
