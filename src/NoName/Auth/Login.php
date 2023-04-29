<?php

namespace NoName\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use NoName\Auth\Exceptions\InvalidCredentialsException;

class Login
{
    /**
     * @throws InvalidCredentialsException
     */
    public function handle(array $data): Authenticatable
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            throw new InvalidCredentialsException();
        }

        /** @var User $user */
        $user = Auth::user();

        $token = $user->createToken('jwt');

        $user->token = $token->plainTextToken;

        return $user;
    }
}
