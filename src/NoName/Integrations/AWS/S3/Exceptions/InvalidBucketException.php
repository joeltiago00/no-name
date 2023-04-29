<?php

namespace NoName\Integrations\AWS\S3\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidBucketException extends S3Exception
{
    public function __construct()
    {
        parent::__construct(
            trans('integrations.aws.bucket.invalid'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
