<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserListRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use NoName\User\UserList;

class UserListController extends Controller
{
    public function __construct(private readonly UserList $action)
    {
    }

    /**
     * User List
     *
     * List of all users paginated
     *
     * @responseFile ApiResponses/User/list.json
     * @group        User
     */
    public function __invoke(UserListRequest $request): AnonymousResourceCollection
    {
        return UserResource::collection($this->action->handle($request->validated()));
    }
}
