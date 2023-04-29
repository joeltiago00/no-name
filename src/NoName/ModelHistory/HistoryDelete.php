<?php

namespace NoName\ModelHistory;

use NoName\ModelHistory\DTO\HistoryDTO;
use Illuminate\Database\Eloquent\Model;
use Repositories\History\HistoryRepository;

class HistoryDelete
{
    public function __construct(private readonly HistoryRepository $historyRepository)
    {
    }

    public function handle(Model $model, int $userDeleteId): void
    {

        $dto = new HistoryDTO($model::class, $model->getKey());

        $dto->setUserDeleteId($userDeleteId);

        $this->historyRepository->create($dto);

    }
}
