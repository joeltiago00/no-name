<?php

namespace Repositories\History;

use App\Models\History;
use NoName\ModelHistory\DTO\HistoryDTO;

interface HistoryRepository
{
    public function create(HistoryDTO $dto): History;
}
