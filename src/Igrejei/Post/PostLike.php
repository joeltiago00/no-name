<?php

namespace Igrejei\Post;

use Igrejei\Post\Exceptions\PostNotExistException;
use Repositories\Post\PostRepository;
use Repositories\PostLike\PostLikeRepository;

class PostLike
{
    public function __construct(
        private PostLikeRepository $postLikeRepository,
        private PostRepository $postRepository
    ) {
    }

    /**
     * @throws PostNotExistException
     */
    public function handle(int $postId, int $userId): void
    {
        if (!$this->postRepository->existById($postId)) {
            throw new PostNotExistException();
        }

        if ($this->postLikeRepository->likedByUserIdAndPostId($userId, $postId)) {
            $this->postLikeRepository->unlikeByUserIdAndPostId($userId, $postId);

            return;
        }

        $this->postLikeRepository->likeByUserIdAndPostId($userId, $postId);
    }
}
