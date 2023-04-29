<?php

namespace Repositories\PostFile;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use NoName\Post\DTO\PostFileDTO;

interface PostFileRepository
{
    public function createByPost(Post $post, PostFileDTO $dto): Model;
}
