<?php

namespace App\Traits\Database;

use Illuminate\Database\Eloquent\Model;

trait RepositoryTrait
{
    public function store(array $data): Model
    {
        return $this->model
            ->newQuery()
            ->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function findById(int $id): Model
    {
        return $this->model
            ->newQuery()
            ->findOrFail($id);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function forceDelete(Model $model): bool
    {
        return $model->forceDelete();
    }
}
