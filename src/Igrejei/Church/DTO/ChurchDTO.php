<?php

namespace Igrejei\Church\DTO;

use Igrejei\DTO;
use Illuminate\Support\Fluent;

class ChurchDTO extends DTO
{
    public function __construct(
        public readonly ?int $churchTypeId,
        public readonly ?string $name,
        public readonly ?int $leaderId,
        public readonly ?string $street,
        public readonly ?string $number,
        public readonly ?string $neighborhood,
        public readonly ?string $city,
        public readonly ?string $state,
        public readonly ?string $country,
        public readonly ?string $zipcode,
        public readonly ?string $complement,
        public readonly ?int $userCreateId
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        $dataFluent = new Fluent($data);

        return new self(
            $dataFluent->get('church_type_id'),
            $dataFluent->get('name'),
            $dataFluent->get('leader_id'),
            $dataFluent->get('street'),
            $dataFluent->get('number'),
            $dataFluent->get('neighborhood'),
            $dataFluent->get('city'),
            $dataFluent->get('state'),
            $dataFluent->get('country'),
            $dataFluent->get('zipcode'),
            $dataFluent->get('complement'),
            $dataFluent->get('user_create_id'),
        );
    }
}
