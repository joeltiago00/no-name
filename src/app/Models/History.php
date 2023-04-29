<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use SoftDeletes;

    protected $table = 'historical';

    protected $fillable = [
        'model',
        'model_id',
        'old_value',
        'new_value',
        'user_update_id',
        'user_delete_id'
    ];
}
