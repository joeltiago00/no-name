<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostListRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use NoName\Post\PostList;

class PostListController extends Controller
{
    public function __construct(private readonly PostList $action)
    {
    }

    public function __invoke(PostListRequest $request): AnonymousResourceCollection
    {
        return PostResource::collection($this->action->handle($request->validated()));
    }
}
