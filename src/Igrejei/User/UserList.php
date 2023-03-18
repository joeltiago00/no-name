<?php

namespace Igrejei\User;

use App\Enums\PaginateEnum;
use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\User\UserRepository;

readonly class UserList
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(array $data): LengthAwarePaginator
    {
        return $this->userRepository->list(
            $data['page'] ?? PaginateEnum::PAGE->default(),
            $data['per_page'] ?? PaginateEnum::PER_PAGE->default(),
            $data['search']
        );
    }
}
