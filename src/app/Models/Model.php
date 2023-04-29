<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as ModelEloquent;
use NoName\ModelHistory\HistoryDelete;
use NoName\ModelHistory\HistoryUpdate;
use Repositories\History\HistoryRepository;

abstract class Model extends ModelEloquent
{
    protected static function boot()
    {
        parent::boot();

        $loggedUser = auth()?->user()->getKey();

        static::updating(
            function (ModelEloquent $model) use ($loggedUser) {
                (new HistoryUpdate(app(HistoryRepository::class)))
                ->handle($model, $loggedUser);
            }
        );

        static::deleting(
            function (ModelEloquent $model) use ($loggedUser) {
                (new HistoryDelete(app(HistoryRepository::class)))
                ->handle($model, $loggedUser);
            }
        );
    }
}
