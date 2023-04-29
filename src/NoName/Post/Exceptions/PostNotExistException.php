<?php

namespace NoName\Post\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class PostNotExistException extends PostException
{
    public function __construct()
    {
        parent::__construct(
            trans('post.not-exist'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
