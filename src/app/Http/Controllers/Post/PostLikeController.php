<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use NoName\Post\Exceptions\PostNotExistException;
use NoName\Post\PostLike;

class PostLikeController extends Controller
{
    public function __construct(private readonly PostLike $action)
    {
    }

    /**
     * Like/Unlike Post
     *
     * Like/Unlike user post
     *
     * @group  Post
     * @throws PostNotExistException
     */
    public function __invoke(int $postId): Response
    {
        $this->action->handle($postId, auth()->user()->getKey());

        return response()->noContent();
    }
}
