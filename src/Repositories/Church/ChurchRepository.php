<?php

namespace Repositories\Church;

use App\Models\Church;
use Illuminate\Pagination\LengthAwarePaginator;
use NoName\Church\DTO\ChurchDTO;

interface ChurchRepository
{
    public function create(ChurchDTO $dto): Church;

    public function updateByChurch(Church $church, ChurchDTO $dto): bool;

    public function list(array $filters = []): LengthAwarePaginator;

    public function deleteById(int $churchId): bool;
}
