<?php

namespace NoName\Church;

use NoName\Church\DTO\ChurchDTO;
use NoName\Church\Exceptions\ChurchNotUpdatedException;
use Repositories\Church\ChurchRepository;

readonly class ChurchUpdate
{
    public function __construct(private ChurchRepository $churchRepository)
    {
    }

    /**
     * @throws ChurchNotUpdatedException
     */
    public function handle(int $churchId, array $data): void
    {
        $church = $this->churchRepository
            ->findById($churchId);

        if (!$this->churchRepository->updateByChurch($church, ChurchDTO::makeFromArray($data))) {
            throw new ChurchNotUpdatedException();
        }
    }
}
