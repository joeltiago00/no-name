<?php

namespace Igrejei\Church;

use Igrejei\Church\DTO\ChurchDTO;
use Igrejei\Church\Exceptions\ChurchNotUpdatedException;
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
