<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\JsonResponse;
use NoName\Post\PostStore;
use Symfony\Component\HttpFoundation\Response;

class PostStoreController extends Controller
{
    public function __construct(private readonly PostStore $action)
    {
    }

    /**
     * Store Post
     *
     * Make new user post
     *
     * @responseFile 201 ApiResponses/Post/post.json
     * @group        Post
     */
    public function __invoke(PostStoreRequest $request, int $userId): JsonResponse
    {
        return PostResource::make($this->action->handle($userId, $request->validated()))
            ->response()
            ->setStatusCode(Response::HTTP_NO_CONTENT);
    }
}
