<?php

namespace NoName\ModelHistory;

use NoName\ModelHistory\DTO\HistoryDTO;
use Illuminate\Database\Eloquent\Model;
use Repositories\History\HistoryRepository;

class HistoryUpdate
{
    public function __construct(private readonly HistoryRepository $historyRepository)
    {
    }

    public function handle(Model $model, int $userUpdateId): void
    {
        $changes = collect($model->getDirty());

        $changes->each(function (string $value, string $key) use ($model, $userUpdateId) {
            $dto = new HistoryDTO($model::class, $model->getKey());

            $dto->setUserUpdateId($userUpdateId)
                ->setField($key)
                ->setOldValue($model[$key])
                ->setNewValue($value);

            $this->historyRepository->create($dto);
        });

    }
}
