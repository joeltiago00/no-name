<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Igrejei\Post\Exceptions\PostNotExistException;
use Igrejei\Post\PostLike;
use Illuminate\Http\Response;

class PostLikeController extends Controller
{
    public function __construct(private readonly PostLike $action)
    {
    }

    /**
     * Like/Unlike Post
     *
     * Like/Unlike user post
     * @group Post
     * @throws PostNotExistException
     */
    public function __invoke(int $postId): Response
    {
        $this->action->handle($postId, auth()->user()->getKey());

        return response()->noContent();
    }
}
