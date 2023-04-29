<?php

namespace Igrejei\Church;

use App\Models\Church;
use Igrejei\Church\DTO\ChurchDTO;
use Repositories\Church\ChurchRepository;

readonly class ChurchStore
{
    public function __construct(private ChurchRepository $churchRepository)
    {
    }

    public function handle(array $data): Church
    {
        return $this->churchRepository
            ->create(ChurchDTO::makeFromArray($data));
    }
}
