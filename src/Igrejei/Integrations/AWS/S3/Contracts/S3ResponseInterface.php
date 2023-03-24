<?php

namespace Igrejei\Integrations\AWS\S3\Contracts;

interface S3ResponseInterface
{
    public function getUrl(): string;

    public function getObjectListUrl(): array;
}
