<?php

namespace NoName\Church;

use App\Models\Church;
use NoName\Church\DTO\ChurchDTO;
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
