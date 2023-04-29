<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use NoName\Auth\Exceptions\InvalidCredentialsException;
use NoName\Auth\Login;

class LoginController extends Controller
{
    public function __construct(private readonly Login $action)
    {
    }

    /**
     * Login
     *
     * Make user login
     *
     * @responseFile ApiResponses/Auth/login.json
     * @group        Auth
     *
     * @throws InvalidCredentialsException
     */
    public function __invoke(LoginRequest $request): LoginResource
    {
        return LoginResource::make($this->action->handle($request->validated()));
    }
}
