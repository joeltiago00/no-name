<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $church_type_id
 * @property string $name
 * @property int $leader_id
 * @property string $street
 * @property string $number
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $complement
 */
class Church extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'churches';

    protected $fillable = [
        'church_type_id',
        'name',
        'leader_id',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'country',
        'zipcode',
        'complement',
    ];

    public function type(): HasOne
    {
        return $this->hasOne(ChurchType::class, 'id', 'church_type_id');
    }

    public function leader(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'leader_id');
    }
}
