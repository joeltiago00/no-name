<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'text',
        'user_id'
    ];

    public function files(): HasMany
    {
        return $this->hasMany(PostFile::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    /**
     * TODO:: handle with it in another better way
     */
    public function usersLiked(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            PostLike::class,
            'deleted_at',
            'id',
            'post_id',
            'user_id')
            ->where('post_id', $this->getKey());
    }
}
