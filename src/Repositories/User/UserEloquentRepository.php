<?php

namespace Repositories\User;

use App\Models\User;
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
}
