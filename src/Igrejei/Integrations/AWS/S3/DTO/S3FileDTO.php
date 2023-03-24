<?php

namespace Igrejei\Integrations\AWS\S3\DTO;

class S3FileDTO
{
    private string $bucket;
    private string $acl = 'public-read';

    public function __construct(
        private readonly string $file,
        private readonly string $fileName
    )
    {
    }

    public function setBucket(string $bucket): self
    {
        $this->bucket = $bucket;

        return $this;
    }

    /**
     * List of ACLs
     * @see https://docs.aws.amazon.com/AmazonS3/latest/userguide/acl-overview.html
     */
    public function setAcl(string $acl): self
    {
        $this->acl = $acl;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'Key' => $this->fileName,
            'SourceFile' => $this->file,
            'ACL' => $this->acl
        ];
    }
}
