<?php

namespace Igrejei\Post;

use Igrejei\DTO;

class PostFileDTO extends DTO
{
    public function __construct(
//        public readonly int $postId,
        public readonly string $link
    )
    {
    }
}
