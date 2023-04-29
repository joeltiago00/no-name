<?php

namespace Igrejei\Post;

use App\Enums\PaginateEnum;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\Post\PostRepository;

readonly class PostList
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function handle(array $data): LengthAwarePaginator
    {
        $posts = $this->postRepository
            ->list(
                $data['page'] ?? PaginateEnum::PAGE->default(),
                $data['per_page'] ?? PaginateEnum::PER_PAGE->default(),
                $data
            );

        $posts->each(function (Post $post) {
            $post->usersLiked = $post->usersLiked()->get();
            $post->likesCount = $post->likes()->count();
        });

        return $posts;
    }
}
