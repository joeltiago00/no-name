<?php

namespace Igrejei\User;

use App\Enums\PaginateEnum;
use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\User\UserRepository;

class UserList
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function handle(array $data): LengthAwarePaginator
    {
        return $this->userRepository->list(
            $data['page'] ?? PaginateEnum::PAGE->default(),
            $data['per_page'] ?? PaginateEnum::PER_PAGE->default()
        );
    }
}
