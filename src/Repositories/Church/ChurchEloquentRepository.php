<?php

namespace Repositories\Church;

use App\Enums\PaginateEnum;
use App\Models\Church;
use Igrejei\Church\DTO\ChurchDTO;
use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\Repository;

class ChurchEloquentRepository extends Repository implements ChurchRepository
{
    public function __construct()
    {
        $this->model = new Church();
    }

    public function create(ChurchDTO $dto): Church
    {
        return $this->model
            ->newQuery()
            ->create($dto->toArray(true));
    }

    public function updateByChurch(Church $church, ChurchDTO $dto): bool
    {
        return $church->update($dto->toArray());
    }

    public function list(array $filters = []): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->when(isset($filters['name']), fn($query) => $query->where('name', $filters['name']))
            ->with(['leader'])
            ->paginate(
                perPage: $filters['per_page'] ?? PaginateEnum::PER_PAGE->default(),
                page: $filters['page'] ?? PaginateEnum::PAGE->default()
            );
    }

    public function deleteById(int $churchId): bool
    {
        return $this->model
            ->newQuery()
            ->findOrFail($churchId)
            ->delete();
    }
}
