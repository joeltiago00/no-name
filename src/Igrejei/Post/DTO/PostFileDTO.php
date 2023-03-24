<?php

namespace Igrejei\Post\DTO;

use Igrejei\DTO;

class PostFileDTO extends DTO
{
    public function __construct(
        public readonly string $link
    )
    {
    }
}
