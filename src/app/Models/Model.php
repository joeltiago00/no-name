<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as ModelEloquent;

abstract class Model extends ModelEloquent
{
    // TODO:: implement history of changes (update and delete)
    protected static function boot()
    {
        parent::boot();

        self::updating(function (ModelEloquent $model) {
        });

        self::deleting(function (ModelEloquent $model) {
        });
    }
}
