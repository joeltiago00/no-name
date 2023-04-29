<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailConfirmation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'email_confirmations';

    protected $fillable = [
        'user_id',
        'code',
        'expires_in',
        'confirmed_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
