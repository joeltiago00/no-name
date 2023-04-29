<?php

namespace NoName\Auth;

use App\Models\User;
use Repositories\User\UserRepository;

readonly class Logout
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(User $user): void
    {
        $this->userRepository->deleteTokensByUser($user);
    }
}
