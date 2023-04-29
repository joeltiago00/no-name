<?php

namespace Igrejei\Church\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ChurchNotUpdatedException extends ChurchException
{
    public function __construct()
    {
        parent::__construct(
            trans('exceptions.church.not-updated'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
