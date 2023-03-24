<?php

namespace Igrejei\Post\DTO;

use Igrejei\DTO;

class PostDTO extends DTO
{
    public function __construct(
        public readonly string $text
    ) {
    }
}
