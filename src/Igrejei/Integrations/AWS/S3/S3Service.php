<?php

namespace Igrejei\Integrations\AWS\S3;

use Aws\S3\S3Client;
use Igrejei\Integrations\AWS\S3\Contracts\S3ResponseInterface;
use Igrejei\Integrations\AWS\S3\Contracts\S3ServiceInterface;
use Igrejei\Integrations\AWS\S3\DTO\S3FileDTO;
use Symfony\Component\HttpFoundation\Response;

readonly class S3Service implements S3ServiceInterface
{
    public function __construct(private S3Client $client, private string $bucket)
    {
    }

    public function upload(S3FileDTO $dto): S3ResponseInterface
    {
        $response = $this->client
            ->putObject(array_merge(['Bucket' => $this->bucket], $dto->toArray()));

        return new S3Response($response);
    }

    public function all(): S3ResponseInterface
    {
        $response = $this->client
            ->listObjects(['Bucket' => $this->bucket]);

        return new S3Response($response);
    }

    public function getUrl(string $path): S3ResponseInterface
    {
        $response = $this->client
            ->getObject([
                'Bucket' => $this->bucket,
                'Key' => $path
            ]);

        return new S3Response($response);
    }

    public function delete(string $path): bool
    {
        $response = $this->client
            ->deleteObject([
                'Bucket' => $this->bucket,
                'Key' => $path
            ]);

        return $response['@metadata']['statusCode'] === Response::HTTP_NO_CONTENT;
    }
}
