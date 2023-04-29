<?php

namespace NoName\Post\DTO;

use NoName\DTO;

class PostDTO extends DTO
{
    public function __construct(
        public readonly string $text
    ) {
    }
}
