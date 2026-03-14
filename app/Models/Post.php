<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use  HasFactory;
    use SoftDeletes;

    protected $fillable = ["title", "description", "user_id",
        'body'
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
