<?php

namespace Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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

    public function list(int $page, int $perPage, ?string $search = null): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->when(!empty($search), function (Builder $query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('birth_date', 'like', "%$search%");
            })
            ->paginate(perPage: $perPage, page: $page);
    }
}
