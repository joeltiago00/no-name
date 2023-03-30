<?php

namespace Repositories\EmailConfirmation;

use App\Models\EmailConfirmation;
use App\Models\User;
use Igrejei\User\DTO\SendEmailConfirmationDTO;
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
}
