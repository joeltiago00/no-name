<?php

namespace Repositories\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepository
{
    public function deleteTokensByUser(User $user): void;

    public function list(int $page, int $perPage, ?string $search = null): LengthAwarePaginator;
}
