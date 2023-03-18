<?php

namespace App\Enums;

enum PaginateEnum
{
    case PER_PAGE;
    case PAGE;

    public function default(): int
    {
        return match ($this) {
            self::PAGE => 1,
            self::PER_PAGE => 10,
        };
    }
}
