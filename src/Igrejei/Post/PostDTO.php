<?php

namespace Igrejei\Post;

use Igrejei\DTO;

class PostDTO extends DTO
{
    public function __construct(
        public readonly string $text
    ) {
    }
}
