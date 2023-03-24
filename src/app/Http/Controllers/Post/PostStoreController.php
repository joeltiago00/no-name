<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Resources\Post\PostResource;
use Igrejei\Post\StorePost;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PostStoreController extends Controller
{
    public function __construct(private readonly StorePost $action)
    {
    }

    /**
     * Store Post
     *
     * Make new user post
     * @responseFile  ApiResponses/Post/post.json
     * @response
     * @group Post
     */
    public function __invoke(PostStoreRequest $request, int $userId): JsonResponse
    {
        return PostResource::make($this->action->handle($userId, $request->validated()))
            ->response()
            ->setStatusCode(Response::HTTP_NO_CONTENT);
    }
}
