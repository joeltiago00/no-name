<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelEloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use NoName\ModelHistory\HistoryDelete;
use NoName\ModelHistory\HistoryUpdate;
use Repositories\History\HistoryRepository;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'email_verified_at',
        'first_name',
        'last_name',
        'email',
        'password',
        'birth_date',
        'gender',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn(string $value) => Hash::make($value)
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    public function emailConfirmations(): HasMany
    {
        return $this->hasMany(EmailConfirmation::class);
    }

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
