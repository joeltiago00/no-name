<?php

namespace Igrejei\Integrations\AWS\S3\Contracts;

use Igrejei\Integrations\AWS\S3\DTO\S3FileDTO;

interface S3ServiceInterface
{
    public function upload(S3FileDTO $dto): S3ResponseInterface;

    public function all(): S3ResponseInterface;

    public function getUrl(string $path): S3ResponseInterface;

    public function delete(string $path): bool;
}
