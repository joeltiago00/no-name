<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use NoName\Post\PostShow;

class PostShowController extends Controller
{
    public function __construct(private readonly PostShow $action)
    {
    }

    public function __invoke(int $postId): PostResource
    {
        return PostResource::make($this->action->handle($postId));
    }
}
