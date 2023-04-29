<?php

namespace Igrejei\Integrations\AWS\S3;

use Aws\S3\S3Client;
use Igrejei\Integrations\AWS\S3\Exceptions\InvalidBucketException;

class S3
{
    /**
     * @throws InvalidBucketException
     */
    public static function bucket(string $bucket): S3Service
    {
        $config = config(sprintf('aws.bucket.%s', $bucket));

        if (empty($config)) {
            throw new InvalidBucketException();
        }

        return new S3Service(
            new S3Client($config['config']),
            $config['bucket']
        );
    }
}
