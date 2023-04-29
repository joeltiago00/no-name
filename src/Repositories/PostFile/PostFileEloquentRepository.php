<?php

namespace Repositories\PostFile;

use App\Models\Post;
use App\Models\PostFile;
use Illuminate\Database\Eloquent\Model;
use NoName\Post\DTO\PostFileDTO;
use Repositories\Repository;

class PostFileEloquentRepository extends Repository implements PostFileRepository
{
    public function __construct()
    {
        $this->model = new PostFile();
    }

    public function createByPost(Post $post, PostFileDTO $dto): Model
    {
        return $post->files()
            ->create($dto->toArray());
    }
}
