<?php

namespace Repositories\Church;

use App\Models\Church;
use Igrejei\Church\DTO\ChurchDTO;
use Illuminate\Pagination\LengthAwarePaginator;

interface ChurchRepository
{
    public function create(ChurchDTO $dto): Church;

    public function updateByChurch(Church $church, ChurchDTO $dto): bool;

    public function list(array $filters = []): LengthAwarePaginator;

    public function deleteById(int $churchId): bool;
}
