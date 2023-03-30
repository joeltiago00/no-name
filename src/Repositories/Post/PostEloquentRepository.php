<?php

namespace Repositories\Post;

use App\Models\Post;
use App\Models\User;
use Igrejei\Post\DTO\PostDTO;
use Illuminate\Database\Eloquent\Model;
use Repositories\Repository;

class PostEloquentRepository extends Repository implements PostRepository
{
    public function __construct()
    {
        $this->model = new Post();
    }

    public function create(User $user, PostDTO $dto): Model
    {
        return $user->post()
            ->create($dto->toArray());
    }

    public function existById(int $postId): bool
    {
        return $this->model
            ->newQuery()
            ->where('id', $postId)
            ->exists();
    }
}
