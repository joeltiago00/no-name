<?php

namespace Repositories\PostLike;

use App\Models\PostLike;
use Repositories\Repository;

class PostLikeEloquentRepository extends Repository implements PostLikeRepository
{
    public function __construct()
    {
        $this->model = new PostLike();
    }

    public function likedByUserIdAndPostId(int $userId, int $postId): bool
    {
        return $this->model
            ->newQuery()
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->exists();
    }

    public function unlikeByUserIdAndPostId(int $userId, int $postId): bool
    {
        return $this->model
            ->newQuery()
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->delete();
    }

    public function likeByUserIdAndPostId(int $userId, int $postId): PostLike
    {
        return $this->model
            ->newQuery()
            ->create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
    }
}
