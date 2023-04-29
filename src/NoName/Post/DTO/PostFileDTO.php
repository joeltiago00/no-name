<?php

namespace NoName\Post\DTO;

use NoName\DTO;

class PostFileDTO extends DTO
{
    public function __construct(
        public readonly string $link
    ) {
    }
}
