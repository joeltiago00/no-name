<?php

namespace Repositories\PostFile;

use App\Models\Post;
use Igrejei\Post\PostFileDTO;
use Illuminate\Database\Eloquent\Model;

interface PostFileRepository
{
    public function createByPost(Post $post, PostFileDTO $dto): Model;
}
