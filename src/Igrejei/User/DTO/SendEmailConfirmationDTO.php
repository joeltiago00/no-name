<?php

namespace Igrejei\User\DTO;

use Igrejei\DTO;

class SendEmailConfirmationDTO extends DTO
{
    public function __construct(
        public readonly string $code,
        public readonly string $expires_in
    ) {
    }
}
