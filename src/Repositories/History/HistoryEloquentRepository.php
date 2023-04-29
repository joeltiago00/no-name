<?php

namespace Repositories\History;

use App\Models\History;
use NoName\ModelHistory\DTO\HistoryDTO;
use Repositories\Repository;

class HistoryEloquentRepository extends Repository implements HistoryRepository
{
    public function __construct()
    {
        $this->model = new History();
    }

    public function create(HistoryDTO $dto): History
    {
        return $this->model
            ->newQuery()
            ->create($dto->toArray());
    }
}
