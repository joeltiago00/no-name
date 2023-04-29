<?php

namespace Repositories\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use NoName\Post\DTO\PostDTO;

interface PostRepository
{
    public function create(User $user, PostDTO $dto): Model;

    public function existById(int $postId): bool;

    public function getById(int $postId, array $relationships = []): Post;

    public function list(int $page, int $perPage, array $filtros = []): LengthAwarePaginator;
}
