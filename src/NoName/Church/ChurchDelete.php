<?php

namespace NoName\Church;

use NoName\Church\Exceptions\ChurchNotDeletedException;
use Repositories\Church\ChurchRepository;

class ChurchDelete
{
    public function __construct(private readonly ChurchRepository $churchRepository)
    {
    }

    /**
     * @throws ChurchNotDeletedException
     */
    public function handle(int $churchId): void
    {
        if (!$this->churchRepository->deleteById($churchId)) {
            throw new ChurchNotDeletedException();
        }
    }
}
