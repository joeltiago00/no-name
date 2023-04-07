<?php

namespace Repositories\EmailConfirmation;

use App\Models\EmailConfirmation;
use App\Models\User;
use Igrejei\User\DTO\SendEmailConfirmationDTO;

interface EmailConfirmationRepository
{
    public function createByUser(User $user, SendEmailConfirmationDTO $dto): EmailConfirmation;

    public function getByValidCode(string $code): EmailConfirmation;

    public function setConfirmedAt(EmailConfirmation $emailConfirmation): bool;
}
