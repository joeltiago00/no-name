<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use NoName\User\UserStore;
use Symfony\Component\HttpFoundation\Response;

class UserStoreController extends Controller
{
    public function __construct(private readonly UserStore $action)
    {
    }

    /**
     * Create User
     *
     * Create a new User
     *
     * @responseFile ApiResponses/User/store.json
     */
    public function __invoke(UserStoreRequest $request): JsonResponse
    {
        return UserResource::make($this->action->handle($request->validated()))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
