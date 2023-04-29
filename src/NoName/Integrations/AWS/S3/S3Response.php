<?php

namespace NoName\Integrations\AWS\S3;

use Aws\Result;
use NoName\Integrations\AWS\S3\Contracts\S3ResponseInterface;

readonly class S3Response implements S3ResponseInterface
{
    public function __construct(public Result $result)
    {
    }

    public function getUrl(): string
    {
        $url = $this->result['ObjectURL'] ?? '';

        if (!empty($url)) {
            return $url;
        }

        return $this->result['@metadata']['effectiveUri'] ?? '';
    }

    public function getObjectListUrl(): array
    {
        $baseUrl = $this->getBaseUrl();

        return collect($this->result['Contents'])
            ->map(fn($file) => sprintf('%s%s', $baseUrl, $file['Key']))
            ->toArray();
    }

    private function getBaseUrl(): string
    {
        $url = explode('?', $this->result['@metadata']['effectiveUri'] ?? '');

        return $url[0] ?? '';
    }
}
