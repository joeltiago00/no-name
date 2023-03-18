<?php

namespace Repositories\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\Repository;

class UserEloquentRepository extends Repository implements UserRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function deleteTokensByUser(User $user): void
    {
        $user->tokens()->delete();
    }

    public function list(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->paginate(perPage: $perPage, page: $page);
    }
}
