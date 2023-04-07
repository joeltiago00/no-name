<?php

namespace Repositories\EmailConfirmation;

use App\Models\EmailConfirmation;
use App\Models\User;
use Igrejei\User\DTO\SendEmailConfirmationDTO;
use Illuminate\Support\Carbon;
use Repositories\Repository;

class EmailConfirmationEloquentRepository extends Repository implements EmailConfirmationRepository
{
    public function __construct()
    {
        $this->model = new EmailConfirmation();
    }

    public function createByUser(User $user, SendEmailConfirmationDTO $dto): EmailConfirmation
    {
        return $user->emailConfirmations()
            ->create($dto->toArray());
    }

    public function getByValidCode(string $code): EmailConfirmation
    {
        return $this->model
            ->newQuery()
            ->where('code', $code)
            ->where('expires_in', '>', Carbon::now())
            ->where('confirmed_at', null)
            ->firstOrFail();
    }

    public function setConfirmedAt(EmailConfirmation $emailConfirmation): bool
    {
        return $emailConfirmation->update(['confirmed_at' => Carbon::now()]);
    }
}
