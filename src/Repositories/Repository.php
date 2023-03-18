<?php

namespace Repositories;

use App\Traits\Database\RepositoryTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @method store(array $data)
 * @method update(Model $model, array $data)
 * @method findById(int $id)
 * @method delete(Model $model)
 * @method forceDelete(Model $model)
 *
 * @see RepositoryTrait
 */
abstract class Repository
{
    protected Model $model;

    use RepositoryTrait;
}
