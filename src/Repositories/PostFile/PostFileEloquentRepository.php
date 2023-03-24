<?php

namespace Repositories\PostFile;

use App\Models\Post;
use App\Models\PostFile;
use Igrejei\Post\DTO\PostFileDTO;
use Illuminate\Database\Eloquent\Model;
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
