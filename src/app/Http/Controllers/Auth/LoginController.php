<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use Igrejei\Auth\Exceptions\InvalidCredentialsException;
use Igrejei\Auth\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(private readonly Login $action)
    {
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function __invoke(LoginRequest $request): LoginResource
    {
        return LoginResource::make($this->action->handle($request->validated()));
    }
}
