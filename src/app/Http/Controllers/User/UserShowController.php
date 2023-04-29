<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use NoName\User\UserShow;

class UserShowController extends Controller
{
    public function __construct(private readonly UserShow $action)
    {
    }

    /**
     * User Show
     *
     * Show user info
     *
     * @responseFile ApiResponses/User/show.json
     * @group        User
     */
    public function __invoke(int $userId): UserResource
    {
        return UserResource::make($this->action->handle($userId));
    }
}
