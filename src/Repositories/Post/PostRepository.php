<?php

namespace Repositories\Post;

use App\Models\User;
use Igrejei\Post\PostDTO;
use Illuminate\Database\Eloquent\Model;

interface PostRepository
{
    public function create(User $user, PostDTO $dto): Model;
}
