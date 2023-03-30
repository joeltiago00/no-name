<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostLike extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post_likes';

    protected $fillable = [
        'post_id',
        'user_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
