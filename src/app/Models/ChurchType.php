<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChurchType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'church_types';

    protected $fillable = [
        'name'
    ];

    public function churches(): HasMany
    {
        return $this->hasMany(Church::class);
    }
}
