<?php

namespace Repositories\Post;

use App\Models\User;
use Igrejei\Post\DTO\PostDTO;
use Illuminate\Database\Eloquent\Model;

interface PostRepository
{
    public function create(User $user, PostDTO $dto): Model;

    public function existById(int $postId): bool;
}
