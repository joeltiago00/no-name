<?php

namespace NoName\User\DTO;

use NoName\DTO;

class SendEmailConfirmationDTO extends DTO
{
    public function __construct(
        public readonly string $code,
        public readonly string $expires_in
    ) {
    }
}
