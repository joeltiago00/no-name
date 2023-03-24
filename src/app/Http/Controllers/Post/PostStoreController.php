<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Resources\Post\PostResource;
use Igrejei\Post\StorePost;

class PostStoreController extends Controller
{
    public function __construct(private readonly StorePost $action)
    {
    }

    /**
     * Store Post
     *
     * Make new user post
     * @responseFile ApiResponses/Post/post.json
     * @group Post
     */
    public function __invoke(PostStoreRequest $request, int $userId): PostResource
    {
        return PostResource::make($this->action->handle($userId, $request->validated()));
    }
}
