<?php

namespace Repositories\Post;

use App\Models\Post;
use App\Models\User;
use Igrejei\Post\DTO\PostDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\Repository;

class PostEloquentRepository extends Repository implements PostRepository
{
    public function __construct()
    {
        $this->model = new Post();
    }

    public function create(User $user, PostDTO $dto): Model
    {
        return $user->posts()
            ->create($dto->toArray());
    }

    public function existById(int $postId): bool
    {
        return $this->model
            ->newQuery()
            ->where('id', $postId)
            ->exists();
    }

    public function getById(int $postId, array $relationships = []): Post
    {
        return $this->model
            ->newQuery()
            ->with($relationships)
            ->findOrFail($postId);
    }

    public function list(int $page, int $perPage, array $filtros = []): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->when(!empty($filtros['user_id']), fn($query) => $query->where('user_id', $filtros['user_id']))
            ->when(!empty($filtros['text']), fn($query) => $query->where('text', 'like', "%{$filtros['text']}%"))
            ->paginate(perPage: $perPage, page: $page);
    }
}
