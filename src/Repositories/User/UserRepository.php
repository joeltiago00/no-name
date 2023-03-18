<?php

namespace Repositories\User;

use App\Models\User;

interface UserRepository
{
    public function deleteTokensByUser(User $user): void;
}
