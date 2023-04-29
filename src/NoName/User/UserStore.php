<?php

namespace NoName\User;

use App\Models\User;
use Repositories\User\UserRepository;

readonly class UserStore
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(array $data): User
    {
        return $this->userRepository->store($data);
    }
}
