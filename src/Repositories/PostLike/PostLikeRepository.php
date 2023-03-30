<?php

namespace Repositories\PostLike;

use App\Models\PostLike;

interface PostLikeRepository
{
    public function likedByUserIdAndPostId(int $userId, int $postId): bool;

    public function unlikeByUserIdAndPostId(int $userId, int $postId): bool;

    public function likeByUserIdAndPostId(int $userId, int $postId): PostLike;
}
