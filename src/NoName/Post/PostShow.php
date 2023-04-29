<?php

namespace NoName\Post;

use App\Models\Post;
use Repositories\Post\PostRepository;

readonly class PostShow
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function handle(int $postId): Post
    {
        $post = $this->postRepository
            ->getById($postId);

        $post->usersLiked = $post->usersLiked()->get();
        $post->likesCount = $post->likes()->count();

        return $post;
    }
}
