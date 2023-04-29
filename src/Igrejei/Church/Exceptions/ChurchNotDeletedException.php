<?php

namespace Igrejei\Church\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ChurchNotDeletedException extends ChurchException
{
    public function __construct()
    {
        parent::__construct(
            trans('exceptions.church.not-deleted'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
