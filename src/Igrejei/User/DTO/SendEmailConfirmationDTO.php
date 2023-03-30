<?php

namespace Igrejei\User\DTO;

use Igrejei\DTO;
use Illuminate\Support\Carbon;

class SendEmailConfirmationDTO extends DTO
{
    public function __construct(
        public readonly string $code,
        public readonly string $expires_in
    )
    {
    }
}
