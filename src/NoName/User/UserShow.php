<?php

namespace NoName\User;

use App\Models\User;
use Repositories\User\UserRepository;

readonly class UserShow
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(int $userId): User
    {
        return $this->userRepository->findById($userId);
    }
}
