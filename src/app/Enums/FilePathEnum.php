<?php

namespace App\Enums;

enum FilePathEnum
{
    CASE POST;

    public function path(): string
    {
        return match ($this) {
            self::POST => 'users/%s/post/%s/files/%s',
        };
    }
}
